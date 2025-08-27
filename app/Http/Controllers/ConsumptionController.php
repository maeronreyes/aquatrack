<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    //
    public function index(){
        return view('consumption.index');
    }
}
