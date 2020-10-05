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
//        $this->middleware('before');
//        $this->middleware('after');
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return response()->json(['Hi'=>'Shirmadov']);
//        return view('home');
    }

    public function dashboard(){
        return response()->json(['Hi'=>'Sapa']);
    }
}
