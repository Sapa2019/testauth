<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    public function store(){

        //Database yazdyrmak ucin
        //Birinji yol
//        $data = request()->validate([
//            'title'=>'required',
//            'author'=>'required',
//        ]);
//        Book::created($data);

        //Ikinji yol
//       Book::create([
//           'title'=>request('title'),
//           'author'=>request('author'),
//        ]);


        //Yokardakyny ashakda funksiya gornushde yazdyk
        $book = Book::create($this->validateRequest());

        return redirect($book->path());
    }

    public function update(Book $book){

        $book->update($this->validateRequest());
        return redirect($book->path());
    }

    public function delete(Book $book){
        $book->delete();

        return redirect('/book');
    }

    protected function validateRequest(){
        return request()->validate([
           'title'=>'required',
           'author_id'=>'required',
        ]);
    }
}
