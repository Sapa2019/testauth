<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    public function store(){

//        $data = request()->validate([
//            'title'=>'required',
//            'author'=>'required',
//        ]);
        //Yokardakyny ashakda funksiya gornushde yazdyk
        Book::created($this->validateRequest());
//        Book::create([
//           'title'=>request('title'),
//           'author'=>request('author'),
//        ]);
    }

    public function update(Book $book){

        $book->update($this->validateRequest());
    }

    protected function validateRequest(){
        return request()->validate([
           'title'=>'required',
           'author'=>'required',
        ]);
    }
}
