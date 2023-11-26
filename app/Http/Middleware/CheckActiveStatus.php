<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user's status is "active"
            if (auth()->user()->status === 'active') {
                return $next($request);
            } else {
                // If not active, log the user out and return an error response
                auth()->logout();
                return redirect()->route('login')->with('error', 'User is not active. Logged out.');
            }
        } else {
            // If the user is not authenticated, you can redirect or return an error response
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
}
