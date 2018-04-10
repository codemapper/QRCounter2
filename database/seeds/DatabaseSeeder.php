<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //Stations

        DB::table('stations')->insert([
            'name' => 'Gast-Scanner',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('stations')->insert([
            'name' => 'Gutschein-Drucker',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('stations')->insert([
            'name' => 'Game 1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        //Points Table

        DB::table('points')->insert([
            'name' => 'Lesen',
            'points' => 0,
            'station_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('points')->insert([
            'name' => 'Essens Bon',
            'points' => -20,
            'station_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('points')->insert([
            'name' => 'Getränke Bon',
            'points' => -10,
            'station_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('points')->insert([
            'name' => 'Süssigkeiten Bon',
            'points' => -10,
            'station_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('points')->insert([
            'name' => '15 Punkte',
            'points' => 15,
            'station_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //users

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@bbcag.ch',
            'password' => bcrypt('admin'),
            'admin' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'operator',
            'email' => 'operator@bbcag.ch',
            'password' => bcrypt('operator'),
            'admin' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
