<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset the user table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        //Generate 3 user data
        DB::table('users')->insert([
            [
                'name' => "Hesham Mostafa",
                'email' => "hesham@hh.com",
                'password' => bcrypt('secret'),
                
            ],
            [
                'name' => "Ahmed Hegazy",
                'email' => "ahmed@aa.com",
                'password' => bcrypt('secret'),
                
            ],
            [
                'name' => "Ibrahim Hassan",
                'email' => "ibrahim@ii.com",
                'password' => bcrypt('secret'),
                
            ],
        ]);
    }
}
