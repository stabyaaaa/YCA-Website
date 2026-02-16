<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Validate login credentials (email & password)
    $request->authenticate();

    // Regenerate session for security
    $request->session()->regenerate();

    // Get the currently authenticated user
    $user = auth()->user();

    // 🔒 BLOCK pending admins
    if ($user->role === 'admin' && $user->status === 'pending') {

        // Logout the user immediately
        auth()->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect back to login with error message
        return redirect('/login')->withErrors([
            'email' => 'Your admin account is pending approval by Super Admin.',
        ]);
    }

    // If everything is OK, redirect normally
    return redirect()->intended('/');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
