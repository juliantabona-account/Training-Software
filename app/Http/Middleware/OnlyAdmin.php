<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

class OnlyAdmin
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

        if(Auth::check() && Auth::user()->hasRole('admin')){

            return $next($request);
        
        }else{

            return redirect('/courses');

        }
    }
}
