<?php

namespace App\Http\Controllers;

use App\Station;
use App\Point;
use App\CodePoint;
use Illuminate\Http\Request;

class DataProtectionController extends Controller
{
    public function index()
    {
        $station = Station::where('name', 'Gast-Scanner')->first();
        $point = Point::where('name', 'Lesen')->first();

        return view('dataprotection.index', ['station' => $station, 'point' => $point]);
    }

    public function fetch(Request $request)
    {
        $history = [];

        $code = $request->input('code');

        $points = CodePoint::where('code_id', $code)->get();
        foreach ($points as $point) {
            $ppoint = Point::where('id', $point->point_id)->first();
            $station = Station::where('id', $ppoint->station_id)->first();

            $history[] = [
                'station' => $station,
                'point' => $ppoint,
            ];
        }

        return view('dataprotection.fetch', ['history' => $history]);
    }
}
