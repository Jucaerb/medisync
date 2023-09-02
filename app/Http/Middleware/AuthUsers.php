<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if(Auth::check()) {
            foreach ($role as $roles) {
                if (Auth::user()->role == $roles) {
                    return $next($request);
                }
            }
            if (Auth::user()->role == 'ADMIN' || Auth::user()->role == 'CG_ADMIN' ) {
                return redirect()->route('home');
            }
            return redirect()->route('myaplications');
        }
    }
}
