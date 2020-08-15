<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class BanSuspendChecker
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
        $user = User::find(session("student_id"));

        if($user->baned){
            return redirect("student/baned");
        }elseif($user->suspended){
            return redirect("student/suspended");
        }


        return $next($request);
    }
}
