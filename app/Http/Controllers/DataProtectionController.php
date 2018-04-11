<?php

namespace App\Http\Controllers;

use App\Station;
use App\Code;
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

        $codeId = $request->input('code');

        $code = Code::where('code', $codeId)->first();
        $points = CodePoint::where('code_id', $code->id)->get();
        foreach ($points as $point) {
            $ppoint = Point::where('id', $point->point_id)->first();
            $station = Station::where('id', $ppoint->station_id)->first();

            $history[] = [
                'station' => $station,
                'point' => $ppoint,
            ];
        }

        return view('dataprotection.fetch', [
            'history' => $history,
            'code' => $code,
            'numberOfVisits' => count($points),
            'price' => $this->getPrice($code, count($points)),
        ]);
    }

    private function getPrice($code, $numberOfPoints)
    {
        $price = 0;

        if (!empty($code->question_prename)) {
            $price += 10;
        }
        if (!empty($code->question_name)) {
            $price += 15;
        }
        if (!empty($code->question_gender)) {
            $price += 10;
        }
        if (!empty($code->question_alone)) {
            $price += 15;
        }
        if (!empty($code->question_event)) {
            $price += 20;
        }
        if (!empty($code->question_event_rating)) {
            $price += 15;
        }
        if (!empty($code->question_loved_station)) {
            $price += 15;
        }

        $price += $numberOfPoints * 10;

        return $price;
    }
}
