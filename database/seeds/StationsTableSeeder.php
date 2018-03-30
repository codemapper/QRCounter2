<?php

use Illuminate\Database\Seeder;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')->insert([
            'name' => 'Game 1',
        ]);
        DB::table('stations')->insert([
            'name' => 'Game 2',
        ]);
        DB::table('stations')->insert([
            'name' => 'Game 3',
        ]);
    }
}
