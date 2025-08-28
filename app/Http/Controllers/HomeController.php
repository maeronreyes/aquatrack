<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
         $page = [
            'name'      =>  'Dashboard',
            'title'     =>  'Dashboard',
            'crumb'     =>  array()
        ];

        return view('welcome', compact('page'));
    }
}
