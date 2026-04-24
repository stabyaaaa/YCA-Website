<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectUnverifiedUsers
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            auth()->check() &&
            ! auth()->user()->hasVerifiedEmail() &&
            ! $request->routeIs('verification.notice') &&
            ! $request->routeIs('verification.send') &&
            ! $request->routeIs('verification.verify') &&
            ! $request->is('logout')
        ) {
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}