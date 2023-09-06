<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (Auth::user()->role){
                    case 'DOCTOR':
                        return redirect('/doctor/home');
                    break;
                    case 'BOSS_NURSE':
                        return redirect('/boss_nurse/home');
                    break;
                    case 'NURSE':
                        return redirect('/nurse/home');
                    break;
                    case 'CARER':
                        return redirect('/carer/home');
                    break;
                    case 'INVENTORY':
                        return redirect('/inventory/home');
                    break;
                    case 'ADMIN':
                        return redirect('/admin/home');
                    break;
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
