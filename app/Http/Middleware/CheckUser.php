<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( DB::table('users')->count() > 0) // if there is any user is database then go to login page
        {
            return $next($request);
        }
        else
        {
          return redirect()->route('register');      
        }
        
    }
}
