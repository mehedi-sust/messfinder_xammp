<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mess = DB::select('select * from basic_mess_info ');
        $locations = DB::table('location')
            ->select('*')
            ->get();
        
        return view('index')->with(['locations'=>$locations])->with(['mess'=>$mess]);
    }
}
