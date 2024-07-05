<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
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
            if (Auth::user()->type==1)
            {
                return redirect('');
            }
            else if (Auth::user()->type==2)
            {
                return redirect('');
            }

            return redirect('admin/dashbord');
        }

        abort(403, 'Unauthorized action.');
    }
    /**/
}
