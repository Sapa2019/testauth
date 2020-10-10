<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Author;
class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAuthorCreate()
    {
        $this->assertTrue(true);
//        $this->withoutExceptionHandling();
//
        $this->post('/author',[
           'name'=>'Author Name',
           'dob'=>'05/14/1988',
        ]);
//
        $author = Author::all();
        $this->assertCount(1,$author);
        $this->assertInstanceOf(Carbon::class,$author->first()->dob);
        $this->assertEquals('1988/14/05',$author->first()->dob->format('Y/d/m'));

    }
}
