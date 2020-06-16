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
            'first_name' => 'PNC',
            'last_name' => 'Manager',
            'email' => 'virakcambodia44@gmail.com',
            'password' => bcrypt('rootadmin'),
            'address' => 'Phnom Penh, Cambodia',
            'position' => 'Manager',
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'Tutor',
            'last_name' => 'Author',
            'email' => 'virakcambodia22@gmail.com',
            'password' => bcrypt('rootadmin'),
            'address' => 'Phnom Penh, Cambodia',
            'position' => 'Trainer',
        ]);
    }
}
