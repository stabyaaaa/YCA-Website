<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'organization' => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/'
            ],
            'terms_accepted' => 'accepted'
        ], [
            '*.required' => 'This field cannot be empty.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain uppercase, lowercase, number and special character.',
            'password.confirmed' => 'Passwords do not match.',
            'terms_accepted.accepted' => 'You must accept the terms and conditions.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'organization' => $request->organization,
            'country' => $request->country,
            'role' => 'user',
            'status' => 'active',
            'terms_accepted' => true,
            'terms_accepted_at' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // ✅ THIS IS THE IMPORTANT LINE
        return redirect()->route('home')
                         ->with('success', 'Account successfully created!');
    }
}
