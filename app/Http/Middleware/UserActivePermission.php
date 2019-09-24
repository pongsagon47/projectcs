<?php

namespace App\Http\Middleware;

use Closure;

class UserActivePermission
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
        if (auth()->check() && $request->user()->status != 1) {
            return response()->view('error.user.404');
        }
        return $next($request);
    }
}
