<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class ProjectStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next, $guard = null )
    {
        $projectStatus  = $request->route('project')->status->name;
        $projectOwnerID = $request->route('project')->user->id;
        if (Auth::id() != $projectOwnerID && $projectStatus != 'Accepted')
        {
            return redirect()->back()->with('error', "Can not view project");
        }
        return $next($request);
    }
}
