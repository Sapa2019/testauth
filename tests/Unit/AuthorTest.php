<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;


class AuthorTest extends TestCase
{
    use RefreshDatabase;


    //Only name is required to create an author
    public function testaDobIsNullable()
    {
        Author::firstOrCreate([
            'name'=>'John Doe',
        ]);

        $this->assertCount(1,Author::all());
    }
}
