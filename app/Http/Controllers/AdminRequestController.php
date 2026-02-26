<?php

namespace App\Http\Controllers;

use App\Models\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin - Show Create Request Page
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $users = User::where('role', 'user')->get();

        return view('admin.requests.create', compact('users'));
    }

    /*
    |--------------------------------------------------------------------------
    | Admin - Store Role Change Request
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $current = auth()->user();

        if ($current->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        // Admin can only request change for normal users
        if ($user->role !== 'user') {
            return back()->with('error', 'You can only request promotion for normal users.');
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
                'new_role' => 'admin',
            ],
            'status' => 'pending'
        ]);

        return back()->with('success', 'Promotion request sent to Super Admin.');
    }

    /*
    |--------------------------------------------------------------------------
    | Admin - View My Requests
    |--------------------------------------------------------------------------
    */
    public function myRequests()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $requests = AdminRequest::where('requested_by', auth()->id())
            ->latest()
            ->get();

        return view('admin.requests.my-Requests', compact('requests'));
    }

    /*
    |--------------------------------------------------------------------------
    | Super Admin - View All Pending Requests
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403);
        }

        $requests = AdminRequest::where('status', 'pending')
            ->latest()
            ->get();

        // 🔥 Auto-close requests if user already promoted manually
        foreach ($requests as $request) {

            if ($request->action_type === 'change_role') {

                $data = $request->payload;

                $user = User::find($data['user_id'] ?? null);

                if ($user && $user->role === $data['new_role']) {

                    $request->update([
                        'status'      => 'approved',
                        'approved_by' => auth()->id(),
                    ]);
                }
            }
        }

        // Reload only still-pending requests
        $requests = AdminRequest::where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.requests.index', compact('requests'));
    }

    /*
    |--------------------------------------------------------------------------
    | Super Admin - Approve Request
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

            if (!$user) {
                return back()->with('error', 'User not found.');
            }

            // If already promoted manually
            if ($user->role === $data['new_role']) {

                $adminRequest->update([
                    'status'      => 'approved',
                    'approved_by' => auth()->id()
                ]);

                return back()->with('success', 'User was already promoted. Request auto-approved.');
            }

            // Promote user
            $user->update([
                'role' => $data['new_role']
            ]);
        }

        $adminRequest->update([
            'status'      => 'approved',
            'approved_by' => auth()->id()
        ]);

        return back()->with('success', 'Request approved successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Super Admin - Reject Request
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
    }}
