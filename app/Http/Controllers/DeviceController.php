<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //
    public function index(){

         $page = [
            'name'      =>  'Dashboard',
            'title'     =>  'Dashboard',
            'crumb'     =>  array()
        ];

        return view('devices.index', compact('page'));
    }
}
