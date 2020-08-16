<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // if (Auth::check()) {
        //     $roles = Role::with('permissions');
        //     $permissions = [];
        //
        //     foreach ($roles as $role) {
        //         foreach ($role->permissions as $permission) {
        //             if (!in_array($permission, $permissions)) {
        //                 $permissions[] = $permission->type;
        //             }
        //         }
        //     }
        //
        //     foreach ($permissions as $permission) {
        //         Gate::define($permission, function ($user) use ($roles, $permission) {
        //             foreach ($roles as $role) {
        //                 if ($user->role->title == $role->title && in_array($permission, $role->permissions)) {
        //                     return true;
        //                 }
        //             }
        //
        //             return false;
        //         });
        //     }
        // }
    }
}
