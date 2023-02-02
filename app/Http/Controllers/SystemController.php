<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Value;
use Illuminate\Http\Request;

class SystemController extends Controller
{

    public function index(){
        $lastRow = $this->lastRowTotal();
        $records = Value::all();
        return view('index', ['allRecords'=>$records])->with('data',$lastRow);
    }

    public function store(Request $request){
        $value = new Value();

        $time = $request->time;
        $speed = $request->speed;
        $radius = $request->radius;
        $type = $request->inputType;

        $lastRow = $this->lastRowTotal();
        $calculation = $this->calculation($time, $radius, $speed);

        if($type=="input"){
            $value->input_time = $time;
            $value->input_liters = $calculation;
            $value->total_liters = $lastRow + $calculation;
        }else{
            if ($lastRow>=$calculation) {
                $value->output_time = $time;
                $value->output_liters = $calculation;
                $value->total_liters = $lastRow - $calculation;
            }else{
                $allRecords = Value::all();
                $lastRow = $this->lastRowTotal();
                $error = "Can not out this value. Available : ";
                return view("index", compact(['error', 'allRecords']));
            }
        }

        $value->save();
        $lastRow = $this->lastRowTotal();
        $allRecords = Value::all();
        return view("index", compact(['allRecords']));

    }

    private function calculation($input, $radius, $speed){
        $cal = 2*$input*22/7*($radius*$radius)*$speed;
        return $cal;
    }

    private function lastRowTotal(){
        $lastRow = DB::table('values')->latest('total_liters')->first();
        return $lastRow->total_liters;
    }
}
