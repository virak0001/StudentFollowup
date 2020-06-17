<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name' => 'Training Manager',
        ]);
        DB::table('positions')->insert([
            'name' => 'SNA Manager',
        ]);
        DB::table('positions')->insert([
            'name' => 'WEP Trainer',
        ]);
        DB::table('positions')->insert([
            'name' => 'Educator',
        ]);
    }
}
