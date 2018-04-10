<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Point;
use App\Station;
use App\Code;
use Illuminate\Http\Request;

class ScanController extends Controller
{

    public function index()
    {
        $stations = Station::all();
        return view('scan.index',['stations' => $stations]);
    }

    public function points($station)
    {
        $station = Station::find($station);
        $points = Point::where('station_id',$station->id)->get();
        return view('scan.points',['station' => $station, 'points' => $points]);
    }

    public function scan($station,$point)
    {
        $station = Station::find($station);
        $point = Point::find($point);
        $send = route('scan.store',['station' => $station, 'point' => $point]);
        $redirect = route('scan.station',['station' => $station]);
        return view('scan.scan',['station'=>$station,'point'=>$point,'send' => $send, 'redirect' => $redirect,'target'=>'_self']);
    }

    public function store(Request $request, $station, $point)
    {
        $code = $request->input('code');
        $code = Code::where('code',$code)->first();
        if($code == null){
            $code = new Code();
            $code->code = $request->input('code');
            $code->save();
        }
        $code->points()->attach($point);
        $points = $code->points()->sum('points');
        $date = Carbon::create(1955,04,28);
        echo  $date->addYear($points)->format('Y') ;
    }

    public function code(Request $request)
    {
        $code = $request->input('code');
        $code = Code::where('code', $code)->first();
        //return var_dump($code->points('name'));
        $string = "";
        if ($code != null) {
            foreach ($code->points as $row) {
                $string .= "<tr>";
                $string .= "<td>" . $row->station->name . "</td>";
                $string .= "<td>" . $row->points . " Stunden</td>";
                if($row->pivot->created_at != null){
                    $string .= "<td>" . $row->pivot->created_at->format('H:i:s'). "</td>";
                } else {
                    $string .= "<td></td>";
                }

                $string .= "</tr>";
            }
        } else {
            $string = "Code nicht gefunden!";
        }

        return $string;
    }

    public function log($code = null){
        if($code != null){
            $code = Code::where('code',$code)->first();
        }
        $send =  route('scan.code',['code' => $code]);
        return view('scan.log',['code' =>$code,'send' =>$send, 'redirect' => null]);
    }
}
