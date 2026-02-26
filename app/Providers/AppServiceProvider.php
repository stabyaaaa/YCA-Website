<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\AdminRequest;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            $pendingCount = 0;

            if (Auth::check() && Auth::user()->role === 'super_admin') {
                $pendingCount = AdminRequest::where('status', 'pending')->count();
            }

            $view->with('pendingCount', $pendingCount);
        });
    }
}