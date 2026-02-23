<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Check if the user's role matches the required role
        if (Auth::user()->role !== $role) {
            // Redirect them to their own dashboard if they try to access the wrong one
            return redirect()->route(Auth::user()->role . '.dashboard')
                             ->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}