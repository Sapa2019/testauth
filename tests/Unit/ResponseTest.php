<?php

namespace Tests\Unit;

use App\Book;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class ResponseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }

        public function testExample(){
            $this->assertTrue(true);
            $this->post('/books',[
               'title'=>'Cool Title',
               'author'=>'Victor',
            ]);

            $book = Book::first();
//            $book->dumpSession();

            $response = $this->patch('/books/'.$book->id,[
                'title'=>'New Title',
                'author'=>'New Author',
            ]);
            $this->assertEquals('New Title',Book::first()->title);
            $this->assertEquals('New Author',Book::first()->author);

        }
}
