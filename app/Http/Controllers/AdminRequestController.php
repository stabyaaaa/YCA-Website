<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminRequest;

class AdminRequestController extends Controller
{
    // Show request form
    public function create()
    {
        return view('admin.request-create-admin');
    }

    // Submit admin creation request
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        AdminRequest::create([
            'requested_by' => auth()->id(),   // admin who requested
            'action_type'  => 'create_admin',
            'payload'      => [
                'name'  => $request->name,
                'email' => $request->email,
            ],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Request sent to Super Admin for approval.');
    }
}
