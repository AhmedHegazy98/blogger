<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('roles')->truncate();

        // Admin Role
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name='Admin';
        $admin->save();

        // Auther Role
        $auther = new Role();
        $auther->name = 'auther';
        $auther->display_name='Auther';
        $auther->save();

        //// attatch the Roles

        // this user is admin
        $user1 = User::find(4);
        $user1->attachRole($admin);

        // this user is auther
        $user2 = User::find(5);
        $user2->attachRole($auther);


    }
}
