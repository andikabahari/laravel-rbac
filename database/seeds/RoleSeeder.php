<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\RolePermission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new Role;
        $roleAdmin->title = 'Administrator';
        $roleAdmin->description = 'Super user.';
        $roleAdmin->save();

        $adminResources = [
            'user', 'role', 'permission', 'item',
        ];

        $adminActions = [
            'view', 'create', 'edit', 'delete',
        ];

        foreach ($adminResources as $resource) {
            foreach ($adminActions as $action) {
                $permission = Permission::where('title', $action . '-' . $resource)->first();

                $roleAdminPermission = new RolePermission;
                $roleAdminPermission->role_id = $roleAdmin->id;
                $roleAdminPermission->permission_id = $permission->id;
                $roleAdminPermission->save();
            }
        }

        $roleUser = new Role;
        $roleUser->title = 'User';
        $roleUser->description = 'Ordinary user.';
        $roleUser->save();

        $userResources = [
            'item',
        ];

        $userActions = [
            'view', 'create', 'edit', 'delete',
        ];

        foreach ($userResources as $resource) {
            foreach ($userActions as $action) {
                $permission = Permission::where('title', $action . '-' . $resource)->first();

                $roleUserPermission = new RolePermission;
                $roleUserPermission->role_id = $roleUser->id;
                $roleUserPermission->permission_id = $permission->id;
                $roleUserPermission->save();
            }
        }
    }
}
