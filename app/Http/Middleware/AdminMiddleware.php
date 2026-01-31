<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role() === "admin") {
            return $next($request);
        }
        
        $arrayRoute = ['profile.edit', 'profile.update', 'profile.destroy', 'projects.index', 'project.getdata', 'tasks.index', 'tasks.taskgetdata', 'tasks.getdeadline', 'projects.tasks.index', 'apiprojectdata'];

        if (Auth::check() && Auth::user()->role() === "viewer") {
            if (in_array($request->route()->getName(), $arrayRoute)) {
                return $next($request);
            }
        }
        abort(403, 'Unauthorized action.');
    }
}
