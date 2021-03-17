<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class frontendAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('frontend')->user())
        {
             return redirect()->route('user');
        }



        // if (!Auth::guard('frontend')->user())
        // {
        //     return redirect()->route('user');
        // }

        return $next($request);
    }
}
