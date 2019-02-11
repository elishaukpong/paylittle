<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckBVN
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
//            if (Auth::user()->bvn->status != 2) {
//                session()->flash('info','Please Update BVN');
//                return redirect()->route('clientarea');
//            }
        }
        return $next($request);
    }
}
