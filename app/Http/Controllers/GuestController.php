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
        $code = $request->input('code');
        $point = Point::find($point);
        $data = [
            'data' => $point->name,
            'redirect' => "/print/".$point->id,
            'target' => "_blank",
            'timeout' => 0
        ];
        return json_encode($data);
    }

    public function print(Request $request, $point){
        $point = Point::find($point);
        return view('guest.print',['name'=>$point->name]);
    }

}
