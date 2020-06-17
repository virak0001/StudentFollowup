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
            'first_name' => 'admin',
            'last_name' => 'user',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'address' => '',
            'position_id' => 1,
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'normal',
            'last_name' => 'user',
            'email' => 'normal@example.com',
            'password' => bcrypt('password'),
            'address' => '',
            'position_id' => 4,
        ]);
    }
}
