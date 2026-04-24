<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        $redirectUri = url('/auth/google/callback');

        config(['services.google.redirect' => $redirectUri]);

        return Socialite::driver('google')
            ->redirectUrl($redirectUri)
            ->with([
                'prompt' => 'consent select_account',
            ])
            ->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        if ($request->has('error')) {
            return redirect()->route('home')
                ->with('error', 'Google login was cancelled.');
        }

        $redirectUri = url('/auth/google/callback');

        config(['services.google.redirect' => $redirectUri]);

        try {
            $googleUser = Socialite::driver('google')
                ->redirectUrl($redirectUri)
                ->user();

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            /*
            |--------------------------------------------------------------------------
            | New Google Email: Do NOT auto-create user
            |--------------------------------------------------------------------------
            */
            if (! $user) {
                session([
                    'google_register_data' => [
                        'google_id' => $googleUser->getId(),
                        'name'      => $googleUser->getName() ?? 'Google User',
                        'email'     => $googleUser->getEmail(),
                        'avatar'    => $googleUser->getAvatar(),
                    ],
                ]);

                return redirect()->route('home')
                    ->with('google_register_prompt', true)
                    ->with('google_email', $googleUser->getEmail())
                    ->with('info', 'No account found with this Google email.');
            }

            /*
            |--------------------------------------------------------------------------
            | Existing User: Link Google and mark verified
            |--------------------------------------------------------------------------
            */
            $user->forceFill([
                'google_id'         => $user->google_id ?: $googleUser->getId(),
                'avatar'            => $googleUser->getAvatar(),
                'email_verified_at' => $user->email_verified_at ?: now(),
                'status'            => $user->role === 'user' ? 'active' : $user->status,
            ])->save();

            /*
            |--------------------------------------------------------------------------
            | Block Pending Admin
            |--------------------------------------------------------------------------
            */
            if ($user->role === 'admin' && $user->status === 'pending') {
                Auth::logout();

                return redirect()->route('home')
                    ->with('error', 'Your admin account is pending approval by Super Admin.');
            }

            Auth::login($user, true);

            return redirect()->route('home')
                ->with('success', 'Successfully logged in with Google!');

        } catch (\Exception $e) {
            \Log::error('Google Callback Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            return redirect()->route('home')
                ->with('error', 'Google login failed. Please try again later.');
        }
    }

    public function registerWithGoogle()
    {
        $data = session('google_register_data');

        if (! $data) {
            return redirect()->route('home')
                ->with('error', 'Google registration session expired. Please try again.');
        }

        $existingUser = User::where('email', $data['email'])
            ->orWhere('google_id', $data['google_id'])
            ->first();

        if ($existingUser) {
            session()->forget('google_register_data');

            Auth::login($existingUser, true);

            return redirect()->route('home')
                ->with('success', 'Successfully logged in with Google!');
        }

        $user = User::create([
            'google_id'         => $data['google_id'],
            'name'              => $data['name'],
            'email'             => $data['email'],
            'avatar'            => $data['avatar'],
            'email_verified_at' => now(),
            'password'          => bcrypt(Str::random(32)),
            'date_of_birth'     => null,
            'gender'            => null,
            'organization'      => null,
            'country'           => null,
            'terms_accepted'    => true,
            'terms_accepted_at' => now(),
            'status'            => 'active',
            'role'              => 'user',
        ]);

        session()->forget('google_register_data');

        Auth::login($user, true);

        return redirect()->route('home')
            ->with('success', 'Your WePOWER account has been created with Google.');
    }

    public function cancelGoogleRegistration()
    {
        session()->forget('google_register_data');

        return redirect()->route('home')
            ->with('info', 'Google registration cancelled.');
    }
}