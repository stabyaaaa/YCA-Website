<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            abort(403);
        }

        // Check if user's role is in allowed roles
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
