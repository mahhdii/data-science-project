<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthChecker
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

        if(!$request->session()->has('admin_id')){
            return redirect('/admin');
        }
        return $next($request);

    }
}