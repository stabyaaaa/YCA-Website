<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    protected $redirectUri = 'http://localhost:8000/auth/google/callback';

    public function redirectToGoogle()
{
    $redirectUri = 'http://127.0.0.1:8000/auth/google/callback';

    config(['services.google.redirect' => $redirectUri]);

    return Socialite::driver('google')
                    ->redirectUrl($redirectUri)
                    ->redirect();
}
   public function handleGoogleCallback()
{
    $redirectUri = 'http://127.0.0.1:8000/auth/google/callback';

    try {
        $googleUser = Socialite::driver('google')
                               ->redirectUrl($redirectUri)
                               ->user();

        \Log::info('Google User Received', [
            'id' => $googleUser->getId(),
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail()
        ]);

        $user = User::where('google_id', $googleUser->getId())
                    ->orWhere('email', $googleUser->getEmail())
                    ->first();

        if (!$user) {
            $user = User::create([
                'google_id'         => $googleUser->getId(),
                'name'              => $googleUser->getName() ?? 'Google User',
                'email'             => $googleUser->getEmail(),
                'avatar'            => $googleUser->getAvatar(),
                'email_verified_at' => now(),
                'password'          => bcrypt(Str::random(32)),
                'date_of_birth'     => null,
                'gender'            => null,
                'organization'      => null,
                'country'           => null,
                'terms_accepted'    => true,
                'status'            => 'active',
                'role'              => 'user',
            ]);
        } elseif (empty($user->google_id)) {
            $user->update([
                'google_id' => $googleUser->getId(),
                'avatar'    => $googleUser->getAvatar(),
            ]);
        }

        Auth::login($user, true);

        return redirect('/')
                     ->with('success', 'Successfully logged in with Google!');

    } catch (\Exception $e) {
        \Log::error('Google Callback Error: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());

        return redirect()->route('login')
                         ->with('error', 'Google login failed: ' . $e->getMessage());
    }
}
}