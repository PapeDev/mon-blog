<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'P. Moussa',
            'username' => 'admin',
            'email' => 'pmg@blog.sn',
            'password' => bcrypt('123456'),
            'about' => 'Mon bio'
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'El Hadji',
            'username' => 'author',
            'email' => 'elhdji@blog.sn',
            'password' => bcrypt('123456'),
            'about' => 'Mon bio'
        ]);
    }
}
