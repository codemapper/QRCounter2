<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Codes

        DB::table('codes')->insert([
            'code' => 'test',
        ]);

        //Stations

        DB::table('stations')->insert([
            'name' => 'Gast-Scanner',
        ]);
        DB::table('stations')->insert([
            'name' => 'Gutschein-Drucker',
        ]);
        DB::table('stations')->insert([
            'name' => 'Game 1',
        ]);


        //Points Table

        DB::table('points')->insert([
            'name' => 'Lesen',
            'points' => 0,
            'station_id' => 1,
        ]);

        DB::table('points')->insert([
            'name' => 'Essen: -20 Jahre',
            'points' => -20,
            'station_id' => 2,
        ]);

        DB::table('points')->insert([
            'name' => 'Trinken: -10 Jahre',
            'points' => -10,
            'station_id' => 2,
        ]);

        DB::table('points')->insert([
            'name' => 'Süssigkeiten: -10 Jahre',
            'points' => -10,
            'station_id' => 2,
        ]);

        DB::table('points')->insert([
            'name' => '15 Punkte',
            'points' => 15,
            'station_id' => 3,
        ]);
    }
}
