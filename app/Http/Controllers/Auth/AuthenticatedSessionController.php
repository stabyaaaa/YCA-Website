<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     * Since you use login modal, redirect home and open modal.
     */
    public function create()
    {
        return redirect()->route('home')
            ->with('error', 'Please log in first to verify your email.')
            ->with('open_login_modal', true);
    }

    /**
     * Handle login request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validated();

        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->forget('_old_input');

            return back()
                ->withErrors([
                    'email' => 'Invalid credentials.',
                ], 'login');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        /**
         * Block pending admins.
         */
        if ($user->role === 'admin' && $user->status === 'pending') {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $request->session()->forget('_old_input');

            return back()
                ->withErrors([
                    'email' => 'Your admin account is pending approval by Super Admin.',
                ], 'login');
        }

        /**
         * If user logged in with email/password but email is not verified,
         * send them directly to the verify email page.
         */
        if (! $user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        /**
         * Verified users go to intended page or homepage.
         */
        return redirect()->intended('/');
    }

    /**
     * Logout user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}