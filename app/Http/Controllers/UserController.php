<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return response(['created'=>true],201);
    }

    public function index1(){
        return response(['created'=>true],201);
    }

    public function index2(){
        return response('post.index', 201);
    }

    public function Func(){
//        dd("Ds");
        dd(SoGood('Sapa'));
    }

    public function book(){
        return response(['created'=>true],200);
    }
}
