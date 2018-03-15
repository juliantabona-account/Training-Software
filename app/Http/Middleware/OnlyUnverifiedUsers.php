<?php

namespace App\Http\Middleware;

use Closure;

class OnlyUnverifiedUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $client_email, $client_token)
    {

        //Lets get the requested user
        $client = User::where('email', $client_email)->first();

        if(!Auth::check() && ){

            return $next($request);
        
        }else if(!Auth::check() && Auth::user()->hasRole('admin')){

        }else{

            return redirect('/courses');

        }
    }
}
