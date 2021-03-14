<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class SubscriberRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( !Auth::check() ) {
            return redirect()->route('login');
        } else if (Auth::user()->is_admin) {
            return redirect()->route('admin-home');
        }

        return $next($request);
    }
}
