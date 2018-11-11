<?php

namespace App\Http\Middleware;

use Closure;

class VerifyModerator
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
        if($request->session()->get('signedUser')->user_type != "Moderator") 
        {
            return redirect()->route('user.index');
        }
        return $next($request);
    }
}
