<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login'); // যদি লগিন না থাকে
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized'); // যদি role match না করে
        }

        return $next($request);
    }
}
