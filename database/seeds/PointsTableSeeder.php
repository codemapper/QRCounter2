<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('points')->insert([
                'value' => random_int(0,10).' Meter',
                'points' => random_int(0,10),
                'station_id' => 1,
            ]);
        }
    }
}
