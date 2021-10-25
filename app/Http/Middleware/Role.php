<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
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
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return redirect('login');
        $user = Auth::user();
        $role = $user->role;
        $route = $request->route();
        if ($role == 'admin') {
            if ($route->named('admin.ui')) return $next($request);

            //ADMIN INFORMATION
            if ($route->named('admin.information.ui')) return $next($request);
            if ($route->named('admin.information.form.ui')) return $next($request);
            if ($route->named('admin.information.form')) return $next($request);
            if ($route->named('admin.information.delete')) return $next($request);
            if ($route->named('admin.information.detail.ui')) return $next($request);
            if ($route->named('admin.information.edit.ui')) return $next($request);
            if ($route->named('admin.information.update')) return $next($request);

            //ADMIN PERMISSION
            if ($route->named('admin.permission.ui')) return $next($request);
            if ($route->named('admin.permission.form.ui')) return $next($request);
            if ($route->named('admin.permission.form')) return $next($request);
            if ($route->named('admin.permission.delete')) return $next($request);
            if ($route->named('admin.permission.detail.ui')) return $next($request);
            if ($route->named('admin.permission.edit.ui')) return $next($request);
            if ($route->named('admin.permission.update.permission')) return $next($request);

            //ADMIN GALLERY
            if ($route->named('admin.gallery.ui')) return $next($request);
            if ($route->named('admin.gallery.form')) return $next($request);
            if ($route->named('admin.gallery.detail.ui')) return $next($request);
            if ($route->named('admin.gallery.delete')) return $next($request);
            if ($route->named('admin.gallery.edit.ui')) return $next($request);
            if ($route->named('admin.gallery.update')) return $next($request);

            //ADMIN NEWS
            if ($route->named('admin.news.ui')) return $next($request);
            if ($route->named('admin.news.form')) return $next($request);
            if ($route->named('admin.news.detail.ui')) return $next($request);
            if ($route->named('admin.news.delete')) return $next($request);
            if ($route->named('admin.news.edit.ui')) return $next($request);
            if ($route->named('admin.news.update')) return $next($request);

            //ADMIN PUBLICATION
            if ($route->named('admin.publication.ui')) return $next($request);
            if ($route->named('admin.publication.form')) return $next($request);
            if ($route->named('admin.publication.detail.ui')) return $next($request);
            if ($route->named('admin.publication.delete')) return $next($request);
            if ($route->named('admin.publication.edit.ui')) return $next($request);
            if ($route->named('admin.publication.update')) return $next($request);

        } elseif ($role == 'user') {
            if ($route->named('user.ui')) return $next($request);
        } 
        return redirect('/');
    }
}
