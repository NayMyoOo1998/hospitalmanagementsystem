<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isDoctor
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
        if(Auth::check() && (Auth::user()->role->name == 'doctor' || Auth::user()->role->name == 'admin' )){
            return $next($request);
        }else{
            abort(403, 'Your are not doctor');
        }
    }
}
