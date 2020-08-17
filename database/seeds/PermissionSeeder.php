<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            'user', 'role', 'permission', 'item',
        ];

        $actions = [
            'view', 'create', 'edit', 'delete',
        ];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $permission = new Permission;
                $permission->title = $action . '-' . $resource;
                $permission->save();
            }
        }

        $permission = new Permission;
        $permission->title = 'access-user-management';
        $permission->save();
    }
}
