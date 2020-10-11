<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BookTest extends TestCase
{

    use RefreshDatabase;

    public function test_an_author_id_is_recorded()
    {
//        $this->assertTrue(true);
        Book::create([
            'title'     =>'Cool Title',
            'author_id' =>1,
        ]);

        $this->assertCount(1,Book::all());
    }
}
