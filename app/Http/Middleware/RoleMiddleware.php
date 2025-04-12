<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */ 
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the required role
        if (Auth::check() && Auth::user()->role !== $role) {
            // Redirect if the user does not have the correct role
            return redirect('/');  
        }

        return $next($request);
    }
}
