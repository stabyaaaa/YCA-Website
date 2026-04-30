<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request)
{
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->intended(route('home', absolute: false));
    }

    $attempts = session('verification_resend_attempts', 0);
    $delays = [30, 60, 120];

    $delay = $delays[min($attempts, count($delays) - 1)];
    $lastSent = session('verification_last_sent_at');

    if ($lastSent && now()->diffInSeconds($lastSent) < $delay) {
        $remaining = $delay - now()->diffInSeconds($lastSent);

        return back()->with('status', "Please wait {$remaining} seconds before resending.");
    }

    $request->user()->sendEmailVerificationNotification();

    session([
        'verification_resend_attempts' => $attempts + 1,
        'verification_last_sent_at' => now(),
    ]);

    return back()->with('status', 'verification-link-sent');
}
}