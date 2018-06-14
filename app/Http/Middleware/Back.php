<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Back
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // Backend middleware
    // Only logged in users with the role of admin are allowed in the backend
    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        return redirect('/login');
    }
}
