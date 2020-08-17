<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Role;

class AuthGates
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
        if (Auth::check()) {
            $roles = Role::all();

            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissions[$permission->title][] = $role->id;
                }
            }

            foreach ($permissions as $title => $roles) {
                Gate::define($title, function ($user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}
