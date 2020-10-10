<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(){

        //Bu gornushde hem database'e yazdyryp bolya
        Author::create(request()->only([
            'name','dob',
        ]));

    }
}
