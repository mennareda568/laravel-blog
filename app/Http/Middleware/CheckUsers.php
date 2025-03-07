<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUsers
{
    
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role =="admin"){
            return $next($request);

        }else if (Auth::user() && Auth::user()->role =="user"){
            return $next($request);

        }else {
            return redirect()-> route("login");
        }

    }
}