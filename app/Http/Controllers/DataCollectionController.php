<?php

namespace App\Http\Controllers;

use App\Code;
use Illuminate\Http\Request;

class DataCollectionController extends Controller
{
    public function index()
    {
        return view('datacollection.index');
    }

    public function collect(Request $request)
    {
        $Rcode = $request->input('code');

        $code = Code::find($Rcode);

        return view('datacollection.collect', ['code' => $code]);
    }

    public function update(Request $request)
    {
        $Rcode = $request->input('code');
        $code = Code::find($Rcode);

        $code->question_prename = $request->input('question_prename');
        $code->question_name = $request->input('question_name');
        $code->question_gender = $request->input('question_gender');
        $code->question_alone = $request->input('question_alone');
        $code->question_event = $request->input('question_event');
        $code->question_event_rating = $request->input('question_event_rating');
        $code->question_loved_station = $request->input('question_loved_station');

        $code->save();

        \Session::flash('flash_message', 'Umfrage gespeichert.');

        return back()->withInput();
    }

    public function tableOverview()
    {
        $codes = Code::all();
        $prices = [];

        foreach ($codes as $code) {
            $price = $this->getPrice($code);

            if ($price > 0) {
                $prices[$code->id] = $price;
            }
        }

        return view('datacollection.tableOverview', ['codes' => $codes, 'prices' => $prices]);
    }

    private function getPrice($code)
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

        return $price;
    }
}
