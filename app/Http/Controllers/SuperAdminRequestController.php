<?php

namespace App\Http\Controllers;

use App\Models\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminRequestController extends Controller
{
    // Show all pending admin requests
    public function index()
    {
        $requests = AdminRequest::where('status', 'pending')->get();

        return view('superadmin.requests', compact('requests'));
    }

    // Approve admin creation request
    public function approve($id)
    {
        $request = AdminRequest::findOrFail($id);

        // Safety check: only pending requests
        if ($request->status !== 'pending') {
            return redirect()->back();
        }

        // Create admin user
        User::create([
            'name'     => $request->payload['name'],
            'email'    => $request->payload['email'],
            'password' => Hash::make('password'), // temporary password
            'role'     => 'admin',
        ]);

        // Mark request as approved
        $request->update([
            'status'      => 'approved',
            'approved_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Admin approved and created.');
    }

    // Reject admin creation request
    public function reject($id)
    {
        $request = AdminRequest::findOrFail($id);

        $request->update([
            'status'      => 'rejected',
            'approved_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Admin request rejected.');
    }
}
