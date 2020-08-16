<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\RoleUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'Administrator';
        $admin->email = 'administrator@example.com';
        $admin->password = Hash::make('password');
        $admin->save();

        $roleAdmin = Role::where('title', 'Administrator')->first();

        $userRoleAdmin = new RoleUser;
        $userRoleAdmin->user_id = $admin->id;
        $userRoleAdmin->role_id = $roleAdmin->id;
        $userRoleAdmin->save();

        $user = new User;
        $user->name = 'John Doe';
        $user->email = 'johndoe@example.com';
        $user->password = Hash::make('password');
        $user->save();

        $roleUser = Role::where('title', 'User')->first();

        $userRoleUser = new RoleUser;
        $userRoleUser->user_id = $user->id;
        $userRoleUser->role_id = $roleUser->id;
        $userRoleUser->save();
    }
}
