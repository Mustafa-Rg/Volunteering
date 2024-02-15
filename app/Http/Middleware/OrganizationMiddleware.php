<?php

namespace App\Http\Middleware;

use Closure;

class OrganizationMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type === 'organization') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}