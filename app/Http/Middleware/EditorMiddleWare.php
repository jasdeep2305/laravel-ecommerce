<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EditorMiddleWare
{
    /**
     * To check if the user is logged in as Editor or Admin..
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


           if (Auth::check()&&(Auth::user()->level_id == '2' || Auth::user()->level_id == '1')) {
           //  if(Auth::user()->level_id == '2' || Auth::user()->level_id == '1'){

                 return $next($request);
            }
            else{

               return redirect('home');
               // abort('403','Access Denied');
            }



    }
}
