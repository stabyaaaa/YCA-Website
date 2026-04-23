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
        config(['services.google.redirect' => $this->redirectUri]);

        return Socialite::driver('google')
                        ->redirectUrl($this->redirectUri)
                        ->redirect();
    }

    public function handleGoogleCallback()
    {
        $redirectUri = 'http://localhost:8000/auth/google/callback';

        try {
            $googleUser = Socialite::driver('google')
                                   ->redirectUrl($redirectUri)
                                   ->user();

            // Find existing user
            $user = User::where('google_id', $googleUser->getId())
                        ->orWhere('email', $googleUser->getEmail())
                        ->first();

            $isNewUser = false;

            if (!$user) {
                // Auto create new user
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

                $isNewUser = true;
            } 
            elseif (empty($user->google_id)) {
                // Link Google account
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar'    => $googleUser->getAvatar(),
                ]);
            }git b

            // Login the user
            Auth::login($user, true);

            // Redirect Logic
            if ($isNewUser) {
                // Check if profile is incomplete
                if (empty($user->date_of_birth) || empty($user->gender) || 
                    empty($user->organization) || empty($user->country)) {
                    
                    return redirect('/')
                           ->with('info', 'Welcome! Please complete your profile to enjoy full access.');
                }
            }

            // Normal redirect for existing or complete profiles
            return redirect('/')
                         ->with('success', 'Successfully logged in with Google!');

        } catch (\Exception $e) {
            \Log::error('Google Callback Error: ' . $e->getMessage());
            
            return redirect()->route('login')
                             ->with('error', 'Google login failed. Please try again.');
        }
    }
}