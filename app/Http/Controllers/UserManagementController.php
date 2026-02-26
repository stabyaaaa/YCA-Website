<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdminRequest;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show All Users
    |--------------------------------------------------------------------------
    */
        public function index()
    {
        $users = User::all();

        $pendingRequests = [];

        if (auth()->user()->role === 'admin') {

            $pendingRequests = AdminRequest::where('requested_by', auth()->id())
                ->where('status', 'pending')
                ->where('action_type', 'change_role')
                ->get()
                ->map(function ($request) {
                    return $request->payload['user_id'] ?? null;
                })
                ->filter()
                ->toArray();
        }

        return view('admin.users.index', compact('users', 'pendingRequests'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update User Role
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, User $user)
    {
        $current = auth()->user();

        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        // ❌ Cannot modify yourself
        if ($current->id === $user->id) {
            abort(403, 'You cannot modify yourself.');
        }

        /*
        |--------------------------------------------------------------------------
        | SUPER ADMIN → Direct role change
        |--------------------------------------------------------------------------
        */
        if ($current->role === 'super_admin') {

            $user->update([
                'role' => $request->role
            ]);

            // 🔥 Auto-close related pending requests
            AdminRequest::where('status', 'pending')
                ->where('action_type', 'change_role')
                ->whereJsonContains('payload->user_id', $user->id)
                ->update([
                    'status' => 'approved',
                    'approved_by' => $current->id
                ]);

            return back()->with('success', 'Role updated directly.');
        }

        /*
        |--------------------------------------------------------------------------
        | ADMIN → Send request to super admin
        |--------------------------------------------------------------------------
        */
        if ($current->role === 'admin') {

            // Admin can only request changes for normal users
            if ($user->role !== 'user') {
                abort(403, 'Admins can only modify normal users.');
            }

            // Prevent duplicate pending requests
            $existing = AdminRequest::where('status', 'pending')
                ->where('action_type', 'change_role')
                ->whereJsonContains('payload->user_id', $user->id)
                ->first();

            if ($existing) {
                return back()->with('error', 'A pending request already exists for this user.');
            }

            AdminRequest::create([
                'requested_by' => $current->id,
                'action_type'  => 'change_role',
                'payload'      => [
                    'user_id'  => $user->id,
                    'new_role' => $request->role
                ],
                'status' => 'pending'
            ]);

            return back()->with('success', 'Role change request sent to Super Admin.');
        }

        abort(403);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete User
    |--------------------------------------------------------------------------
    */
    public function destroy(User $user)
    {
        $current = auth()->user();

        // ❌ Cannot delete yourself
        if ($current->id === $user->id) {
            abort(403, 'You cannot delete yourself.');
        }

        /*
        |--------------------------------------------------------------------------
        | ADMIN → Can only delete normal users
        |--------------------------------------------------------------------------
        */
        if ($current->role === 'admin') {

            if ($user->role !== 'user') {
                abort(403, 'Admins cannot delete other admins or super admins.');
            }

            $user->delete();

            return back()->with('success', 'User deleted successfully.');
        }

        /*
        |--------------------------------------------------------------------------
        | SUPER ADMIN → Can delete anyone except themselves
        |--------------------------------------------------------------------------
        */
        if ($current->role === 'super_admin') {

            $user->delete();

            return back()->with('success', 'User deleted successfully.');
        }

        abort(403);
    }

    /*
    |--------------------------------------------------------------------------
    | View Pending Admin Requests (Super Admin Only)
    |--------------------------------------------------------------------------
    */
    public function pendingRequests()
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403);
        }

        $requests = AdminRequest::where('status', 'pending')->latest()->get();

        return view('admin.requests.index', compact('requests'));
    }

    /*
    |--------------------------------------------------------------------------
    | Approve Admin Request
    |--------------------------------------------------------------------------
    */
    public function approve(AdminRequest $adminRequest)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403);
        }

        if ($adminRequest->status !== 'pending') {
            return back()->with('error', 'This request has already been processed.');
        }

        if ($adminRequest->action_type === 'change_role') {

            $data = $adminRequest->payload;

            $user = User::find($data['user_id'] ?? null);

            if ($user) {
                $user->update([
                    'role' => $data['new_role']
                ]);
            }
        }

        $adminRequest->update([
            'status'      => 'approved',
            'approved_by' => auth()->id()
        ]);

        return back()->with('success', 'Request approved successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Reject Admin Request
    |--------------------------------------------------------------------------
    */
    public function reject(AdminRequest $adminRequest)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403);
        }

        if ($adminRequest->status !== 'pending') {
            return back()->with('error', 'This request has already been processed.');
        }

        $adminRequest->update([
            'status'      => 'rejected',
            'approved_by' => auth()->id()
        ]);

        return back()->with('success', 'Request rejected.');
    }
}