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
        $response = $this->post('/book',[
            'title'=>'Cool Book Title',
            'author'=>'Victor',
        ]);

        $book = Book::first();
//        dd($book);
//        $response->assertOk();
        $this->assertCount(1,Book::all());
        $response->assertRedirect('/books/'.$book->id);
    }

    public function testBookRequired(){

        $res = $this->post('/book',[
            'title' =>'',
            'author'=>''
        ]);

        $res->assertSessionHasErrors('title');
        $res->assertSessionHasErrors('author');

    }

        public function testBookUpdate(){
//        $this->withoutExceptionHandling();

            //Bashda tablisa yazdyryas. Sebabi her funksiyanyn bashynda database'daki datalar ocurulyar
            $response = $this->post('/book',[
               'title'=>'Cool Book',
               'author'=>'Victor',
            ]);

            $book = Book::first();
////            $book->dumpSession();

            //Sonra update edyas
            $response = $this->patch($book->path(),[
                'title'=>'New Title1',
                'author'=>'New Author',
            ]);
            $this->assertEquals('New Title1',Book::first()->title);
            $this->assertEquals('New Author',Book::first()->author);

            //Controller'de redirect yazylyp yazylmadygyny bilip bolya ve yazylan redirect bilen deneshdiryas
//            $response->assertRedirect('/books/'.$book->id);
            $response->assertRedirect($book->fresh()->path());

        }


        public function test_book_delete(){

//            $this->withoutExceptionHandling();

            $this->post('/book',[
                'title'=>'Cool Title Delete',
                'author'=>'Victor delete',
            ]);

            $book = Book::first();
            $this->assertCount(1,Book::all());

            $response = $this->delete($book->path());
            $this->assertCount(0,Book::all());

            //Controllerde yazylan redirect bilen deneshdiryas
            $response->assertRedirect('/book');
        }

//        public function testBookAutoAdd(){
//
//            $this->post('/book',[
//               'title'=>'Cool Title',
//               'author'=>'Victor',
//            ]);
//
//            $book = Book::first();
//            $author = Author::first();
//
//            $this->assertCount(1,Author::all());
//            $this->assertEquals($author->id,$book->author_id);
//        }

}
