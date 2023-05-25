<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Redirect;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$levels)
    {
        if(in_array($request->user()->level, $levels)){
            return $next($request); 
        }

        $user = Auth::user();
        
        if (!$user) {
            // User is not authenticated, redirect to landing page
            return Redirect::to('/');
        }

        if(Auth::user()->level == 'admin'){
            return Redirect::to('admin.dashboard');
        }else if(Auth::user()->level == 'panitia'){
            return Redirect::to('panitia.dashboard');
        }else{
            return Redirect::to('user.dashboard');
        }

    }
}

