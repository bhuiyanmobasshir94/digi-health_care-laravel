<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserSession
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
        if(!$request->session()->has('signedUser'))
        {
            return redirect()->route('signin.index'); 
        }
        return $next($request);
    }
}
