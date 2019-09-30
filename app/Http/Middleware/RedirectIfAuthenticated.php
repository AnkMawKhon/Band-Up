<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /* This will check the if the guard is equal to admin */
        switch($guard) {
            case 'admin';
                if(Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
            break;

            default:
                if(Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
            break;
        }
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        return $next($request);
    }
}
