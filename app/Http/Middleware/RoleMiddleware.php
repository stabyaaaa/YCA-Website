<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // If user is not logged in
        if (!auth()->check()) {
            abort(403);
        }

        // If role does not match
        if (auth()->user()->role !== $role) {
            abort(403);
        }

        // Allow request
        return $next($request);
    }
}
