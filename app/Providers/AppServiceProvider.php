<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminRequest;
use App\Models\ContactMessage;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $pendingCount = 0;
            $unreadMessageCount = 0;

            if (Auth::check()) {
                $user = Auth::user();

                if ($user->role === 'super_admin') {
                    $pendingCount = AdminRequest::where('status', 'pending')->count();
                }

                if (in_array($user->role, ['admin', 'super_admin'])) {
                    $unreadMessageCount = ContactMessage::whereIn('status', [
                        'unread',
                        'pending',
                    ])->count();
                }
            }

            $view->with([
                'pendingCount' => $pendingCount,
                'unreadMessageCount' => $unreadMessageCount,
            ]);
        });
    }
}