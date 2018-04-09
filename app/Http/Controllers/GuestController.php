<?php

namespace App\Http\Controllers;

use App\Station;
use App\Point;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        $station = Station::where('name','Gast-Scanner')->first();
        $point = Point::where('name','Lesen')->first();
        return view('welcome', ['station' =>$station,'point' => $point]);
    }
}