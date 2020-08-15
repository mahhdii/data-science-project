<?php

namespace App\Http\Middleware;

use Closure;

class StudentAuthChecker
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
        if(!$request->session()->has('student_id')){
//            exit();
            return redirect('/');

        }
        return $next($request);
    }
}
