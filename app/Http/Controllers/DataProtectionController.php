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
        return view('dataprotection.index');
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
