<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
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

        $role = Role::where('title', 'Administrator')->first();

        $user = new User;
        $user->name = 'Administrator';
        $user->email = 'administrator@example.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->roles()->attach($role->id);
        $user->save();

        /*
        |--------------------------------------------------------------------------
        | Administrator Demo
        |--------------------------------------------------------------------------
        */

        $role = Role::where('title', 'Administrator Demo')->first();

        $user = new User;
        $user->name = 'Administrator Demo';
        $user->email = 'administratordemo@example.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->roles()->attach($role->id);
        $user->save();

        /*
        |--------------------------------------------------------------------------
        | User
        |--------------------------------------------------------------------------
        */

        $role = Role::where('title', 'User')->first();

        $user = new User;
        $user->name = 'John Doe';
        $user->email = 'johndoe@example.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->roles()->attach($role->id);
        $user->save();

        /*
        |--------------------------------------------------------------------------
        | User Demo
        |--------------------------------------------------------------------------
        */

        $role = Role::where('title', 'User Demo')->first();

        $user = new User;
        $user->name = 'John Doe Demo';
        $user->email = 'johndoedemo@example.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->roles()->attach($role->id);
        $user->save();
    }
}
