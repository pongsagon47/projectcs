<?php

namespace App\Http\Middleware;

use Closure;

class CakeDessertPermission
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
        if (auth()->check() && $request->user()->role_employee_id === 7 || $request->user()->role_employee_id  === 1) {
            return $next($request);
        } else {
            return response()->view('error.employee.404');
        }
    }
}
