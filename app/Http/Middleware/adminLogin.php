<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user = Auth::user();

        // if ($user && $user->user_type === "admin")
        // {
        //     return $next($request);
        // }
        //     else{
        //         return redirect()->route('login');
        //     }

        if (Auth::check() && Auth::user()->user_type === 'admin') {
            return $next($request); // Allow access to the requested route
        }

        if ($request->is('signin') || $request->is('forgot') || $request->is('otp') || $request->is('newpass')) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Access denied.');
    }
}
