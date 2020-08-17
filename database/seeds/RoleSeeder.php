<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | Administrator
        |--------------------------------------------------------------------------
        */

        $resources = [
            'user', 'role', 'permission', 'item',
        ];

        $actions = [
            'view', 'create', 'edit', 'delete',
        ];

        $permissionIds = [];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $permission = Permission::where('title', $action . '-' . $resource)->first();
                $permissionIds[] = $permission->id;
            }
        }

        $permission = Permission::where('title', 'access-user-management')->first();
        $permissionIds[] = $permission->id;

        $role = new Role;
        $role->title = 'Administrator';
        $role->description = 'Super user.';
        $role->save();
        $role->permissions()->attach($permissionIds);
        $role->save();

        /*
        |--------------------------------------------------------------------------
        | Administrator Demo
        |--------------------------------------------------------------------------
        */

        $resources = [
            'user', 'role', 'permission', 'item',
        ];

        $actions = [
            'view',
        ];

        $permissionIds = [];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $permission = Permission::where('title', $action . '-' . $resource)->first();
                $permissionIds[] = $permission->id;
            }
        }

        $permission = Permission::where('title', 'access-user-management')->first();
        $permissionIds[] = $permission->id;

        $role = new Role;
        $role->title = 'Administrator Demo';
        $role->description = 'Demo for super user.';
        $role->save();
        $role->permissions()->attach($permissionIds);
        $role->save();

        /*
        |--------------------------------------------------------------------------
        | User
        |--------------------------------------------------------------------------
        */

        $resources = [
            'item',
        ];

        $actions = [
            'view', 'create', 'edit', 'delete',
        ];

        $permissionIds = [];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $permission = Permission::where('title', $action . '-' . $resource)->first();
                $permissionIds[] = $permission->id;
            }
        }

        $role = new Role;
        $role->title = 'User';
        $role->description = 'Ordinary user.';
        $role->save();
        $role->permissions()->attach($permissionIds);
        $role->save();

        /*
        |--------------------------------------------------------------------------
        | User Demo
        |--------------------------------------------------------------------------
        */

        $resources = [
            'item',
        ];

        $actions = [
            'view',
        ];

        $permissionIds = [];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $permission = Permission::where('title', $action . '-' . $resource)->first();
                $permissionIds[] = $permission->id;
            }
        }

        $role = new Role;
        $role->title = 'User Demo';
        $role->description = 'Demo for ordinary user.';
        $role->save();
        $role->permissions()->attach($permissionIds);
        $role->save();
    }
}
