<?php

namespace App\Http\Controllers;

use App\Code;
use App\Station;
use App\Point;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('guest.index');
    }

    public function coupon($point){
        $point = Point::find($point);
        return view('guest.coupon',['point'=>$point,'route'=>'/saldoCheck/'.$point->id]);
    }

    public function saldoCheck(Request $request, $point){
        $codeNumber = $request->input('code');
        $code = Code::where('code',$codeNumber)->first();
        $point = Point::find($point);
        $sum = $code->points()->sum('points');
        $cost = abs($point->points);
        if( $sum < $cost){
            $data = [
                'data' => "Leider hast mit <b>".$sum."</b> gesammelten Jahren, zu wenig Zeit für diesen Bon.",
                'redirect' => "/",
                'target' => "_self",
                'timeout' => 2000
            ];
        } else {
            $code->points()->attach($point);
            $data = [
                'data' => $point->name,
                'redirect' => "/print/".$point->id,
                'target' => "_blank",
                'timeout' => 0
            ];
        }

        return json_encode($data);
    }

    public function print(Request $request, $point){
        $point = Point::find($point);
        return view('guest.print',['name'=>$point->name]);
    }

}
