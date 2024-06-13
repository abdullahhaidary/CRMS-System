<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminmidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(Auth::check()))
        {
            if (Auth::User()->user_type==1)
            {
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect(url('/login'));
            }
        }
        else
        {
            Auth::logout();
            return redirect(url('/login'));
        }

    }
}
