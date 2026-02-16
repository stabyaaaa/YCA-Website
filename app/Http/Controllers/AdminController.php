<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminRequest;

class AdminController extends Controller
{
    /**
     * Handle admin creation or request
     */
    public function store(Request $request)
{
    $user = auth()->user();

    // 🔴 SUPER ADMIN → direct creation
    if ($user->role === 'super_admin') {

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'admin',
            'status'   => 'approved', // ✅ IMPORTANT
        ]);

        return redirect()->back()->with('admin_created', true);
    }

    // 🟡 ADMIN → approval required
    if ($user->role === 'admin') {

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        AdminRequest::create([
            'requested_by' => $user->id,
            'action_type'  => 'create_admin',
            'payload'      => [
                'name'  => $request->name,
                'email' => $request->email,
            ],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Admin request sent for approval.');
    }

    abort(403);
    }
}