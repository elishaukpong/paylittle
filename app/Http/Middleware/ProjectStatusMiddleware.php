<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;


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
        $project = Project::whereSlug($request->route('projectSlug'))->first();
        $projectStatus  = $project->status->name;
        $projectOwnerID = $project->user->id;

        if(Auth::user()){
            if (!Auth::user()->is_admin && Auth::id() != $projectOwnerID && $projectStatus != 'Accepted')
            {
                return redirect()->back()->with('error', "Can not view project");
            }
        }
        return $next($request);
    }
}
