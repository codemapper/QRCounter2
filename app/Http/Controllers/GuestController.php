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
        $send = route('print',['point' => $point]);
        $redirect = "/print/".$point->id;
        return view('guest.coupon',['point'=>$point,'send' => $send, 'redirect' => $redirect,'target'=>'_blank']);
    }

    public function print($point){
        $point = Point::find($point);
        return view('guest.print',['name'=>$point->name]);
    }

}
