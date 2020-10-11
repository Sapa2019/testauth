<?php

namespace Tests\Unit;

use App\Author;
use App\Book;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
class BookManagementTest extends TestCase
{
    use RefreshDatabase;


    public function testBasicExampleBook(){
//        $this->withoutExceptionHandling();
        $response = $this->post('/book',$this->data());

        $book = Book::first();
//        dd($book);
//        $response->assertOk();
        $this->assertCount(1,Book::all());
        $response->assertRedirect('/books/'.$book->id);
    }

    public function testBookRequired(){
        //Bu gornushde hem goyup bolya
//        $res = $this->post('/book',[
//            'title' =>'',
//            'author_id'=>''
//        ]);


        $res = $this->post('/book',array_merge($this->data(),['title'=>'','author_id'=>'']));

//        $res->assertSessionHasErrors('title');
        $res->assertSessionHasErrors('author_id');

    }

        public function testBookUpdate(){
//        $this->withoutExceptionHandling();

            //Bashda tablisa yazdyryas. Sebabi her funksiyanyn bashynda database'daki datalar ocurulyar
//            $response = $this->post('/book',[
//               'title'=>'Cool Book',
//               'author'=>'Victor',
//            ]);
            $response = $this->post('/book',$this->data());

            $book = Book::first();
////            $book->dumpSession();

            //Sonra update edyas
            $response = $this->patch($book->path(),[
                'title'=>'New Title1',
                'author_id'=>1,
            ]);
            $this->assertEquals('New Title1',Book::first()->title);
            $this->assertEquals(5,Book::first()->author_id);

            //Controller'de redirect yazylyp yazylmadygyny bilip bolya ve yazylan redirect bilen deneshdiryas
//            $response->assertRedirect('/books/'.$book->id);
            $response->assertRedirect($book->fresh()->path());

        }


        public function test_book_delete(){

//            $this->withoutExceptionHandling();

            //Bu gornushde hem goyup bolya. Emma kop gaytalayanlygy ucin ayratyn funksiya yazyldy
//            $this->post('/book',[
//                'title'=>'Cool Title Delete',
//                'author'=>'Victor delete',
//            ]);

            $this->post('/book',$this->data());

            $book = Book::first();
            $this->assertCount(1,Book::all());

            $response = $this->delete($book->path());
            $this->assertCount(0,Book::all());

            //Controllerde yazylan redirect bilen deneshdiryas
            $response->assertRedirect('/book');
        }

        public function testNewAuthorAutoAdd(){

        $this->withoutExceptionHandling();
            $this->post('/book',[
               'title'=>'Cool Title',
               'author_id'=>1,
            ]);

            $book = Book::first();
            $author = Author::first();

//            dd($book->author_id);
//            $author->setAuthorAttribute('Sapa');
            $this->assertEquals($author->id,$book->author_id);
            $this->assertCount(1,Author::all());

        }


        private function data(){

        return [
            'title'=>'Cool Book Title',
            'author_id'=>1,
        ];

        }



}
