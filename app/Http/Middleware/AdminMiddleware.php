<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Level_id =1-> Admin
     * Level_id=2=>Editor
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->level_id=='1')
        {
            //dd(Auth::user()->level_id);
            return $next($request);
        }

        else
            abort('403','Access Denied');
    }
}
