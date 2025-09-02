<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumptionReport;
use Illuminate\Support\Facades\DB;

class WaterConsumptionController extends Controller
{
    //
    public function index(Request $request)
    {
        $reports = ConsumptionReport::select('user_id', DB::raw('SUM(total_consumption) as total_consumption'),
        'period_type','period_start','period_end')
        ->with('user')
        ->groupBy('user_id','period_type','period_start','period_end')
        ->get();
        // return$reports;
        return view('consumption.index',compact('reports'));
    }
}
