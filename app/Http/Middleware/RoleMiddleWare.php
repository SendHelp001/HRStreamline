<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null)
{
    logger("Middleware invoked with role: " . $role);
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to access this page.');
    }

    if ($role && Auth::user()->role !== $role) {
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }

    return $next($request);
}
}
