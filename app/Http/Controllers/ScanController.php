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
        return view('scan.scan',['station'=>$station,'point'=>$point,'route'=>$send,'parameter' =>'']);
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
        $data = [
            'data' => $date->addYear($points)->format('Y') ,
            'redirect' => route('scan.station',['station' => $station]),
            'target' => "_self",
            'timeout' => 2000
        ];
        return json_encode($data);
    }

    public function log(){

        return view('scan.log',['route'=>'logResults','parameter' => '']);
    }

    public function logResults(Request $request){
        $codeName = $request->input('code');
        $table = "";
        if($codeName != null){
            $code = Code::where('code',$codeName)->first();
            if($code != null){
                $table = $this->code($code->code);
            } else {
                $table = "Keine Daten erfasst";
            }
        }

        $data = [
            'data' => $table,
            'redirect' => null,
            'target' => null,
            'timeout' => 0
        ];

        return json_encode($data);
    }

    public function code($code)
    {
        $code = Code::where('code', $code)->orderBy('created_at','desc')->first();
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


}
