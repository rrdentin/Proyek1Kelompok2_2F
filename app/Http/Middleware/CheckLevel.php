<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$levels
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$levels)
{
    if (Auth::guest()) {
        // User is not authenticated, redirect to landing page
        return Redirect::to('/');
    }

    $user = Auth::user();

    if (in_array($user->level, $levels)) {
        return $next($request);
    }

    // Redirect based on the user's level
    if ($user->level == 'admin') {
        return Redirect::to('/admin/dashboard');
    } else if ($user->level == 'panitia') {
        return Redirect::to('/panitia/dashboard');
    } else if ($user->level == 'user') {
        return Redirect::to('/user/dashboard');
    }

    // If the user's level is not admin, panitia, or user, redirect to the default location
    return Redirect::to('/');
}
    
}

