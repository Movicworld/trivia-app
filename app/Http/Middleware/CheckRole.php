<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is logged in and has the required role
        if (Auth::check() && Auth::user()->hasRole($role)) {
            return $next($request);
        }

        // If not, redirect to a specific page (or show an error)
        return redirect()->route('login')->with('error', 'Unauthorized access');
    }
}
