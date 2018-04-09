<?php

namespace App\Http\Controllers;
use App\Point;

use App\Station;
use Illuminate\Http\Request;

class PointController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::all();
        return view('points.index', ['points' => $points]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $point = new Point;
        $stations = Station::all()->pluck('name', 'id');
        return view('points.create', ['point' => $point ,'stations' =>$stations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'points' => 'required',
            'station' => 'required',
        ]);

        $point = new Point();
        $point->name = $request->input('name');
        $point->points = $request->input('points');
        $point->station_id = $request->input('station');

        $point->save();
        return redirect('points');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $point = Point::find($id);
        $stations = Station::all()->pluck('name', 'id');
        return view('points.edit', ['point' => $point ,'stations' =>$stations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'points' => 'required',
            'station' => 'required',
        ]);

        $point = Point::find($id);
        $point->name = $request->input('name');
        $point->points = $request->input('points');
        $point->station_id = $request->input('station');

        $point->save();
        return redirect('points');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $point = Point::find($id);
        $point->delete();
        return redirect('points');
    }
}
