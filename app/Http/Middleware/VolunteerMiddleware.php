<?php

namespace App\Http\Middleware;

use Closure;

class VolunteerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type === 'volunteer') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}