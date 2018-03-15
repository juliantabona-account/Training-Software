<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Request;
use App\User;
use Closure;
use Auth;


class OnlyIncompletedProfiles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $client_email)
    {

        

        //Lets get the requested user
        $client = User::where('email', $client_email)->first();

        //User is Verified & Setup
        if(Auth::check() && Auth::user()->status > 1 && Auth::user()->verify == ''){
            
            return redirect('/courses');
        
        //User is Verified but not Setup
        }else if(Auth::check() && Auth::user()->status == 1 && Auth::user()->verify == ''){
            
            $request->session()->flash('status', 'Complete your profile and submit');
            $request->session()->flash('type', 'info');

            return $next($request);

        //User is not Verified and not Setup
        }else if(Auth::check() && Auth::user()->status == 0 && Auth::user()->verify != ''){


            //Logout any active user
            $request->session()->flush(); 
            $request->session()->flash('status', 'Verify your account first from your email');
            $request->session()->flash('type', 'danger');

            return redirect('/login');

        }

    }
}
