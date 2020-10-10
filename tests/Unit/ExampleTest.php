<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Book;
class ExampleTest extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

        //HTTP Tests
        $response1 = $this->get('/');
        $response1->assertStatus(200);


//        $response1->dumpHeaders();
//        $response1->dumpSession();
//        $response1->dump();

        $response2 = $this->post('/user');
        $response2->assertStatus(201);

        $response3 = $this->get('/home');
        $response3->assertStatus(200);

        $response4 = $this->get('/user1');
        $response4->assertStatus(201);

        $response5 = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/user', ['name' => 'Sally']);

        $response5
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);

        $func = SoGood('Sapa');
        $this->assertTrue($func);
//        $response5 = $this->withSession(['foo' => 'bar'])
//            ->get('/');

//        dd($response5);
//        $user = factory(User::class)->create();

//        $response = $this->actingAs($user)
//            ->withSession(['foo' => 'bar'])
//            ->get('/');
//        $this->actingAs($user, 'api');



    }

//    public function testBasicExample12(){
//        $func = PowNum(0);
//        $this->assertFalse($func);
//    }


    public function testBasicExample()
    {
        $response = $this->getJson('/user1', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
    public function testBasicExample1()
    {
        $response = $this->json('POST', '/user', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertExactJson([
                'created' => true,
            ]);
    }


    public function testBasicExampleBook(){
        $this->withoutExceptionHandling();
        $response = $this->post('/book',[
            'title'=>'Cool Book Title',
            'author'=>'Victor',
        ]);

        $response->assertOk();
        $this->assertCount(1,Book::all());
    }
//
//
//    public function testBasicExampleBook2(){
//
////        $data = request()->validate([
////
////        ]);
//        $response = $this->post('/books',[
//           'title'=>'',
//           'author'=>'Victor',
//        ]);
//
//        $response->assertSessionHasErrors('author');
//    }

//    public function testBasicExample2()
//    {
//        $response = $this->json('POST', '/user', ['name' => 'Sally']);
//
//        $response
//            ->assertStatus(201)
//            ->assertJsonPath('team.owner.name', 'foo');
//    }

//    public function testAvatarUpload()
//    {
//        Storage::fake('avatars');
//
//        $file = UploadedFile::fake()->image('avatar.jpg');
//
//        $response = $this->json('POST', '/avatar', [
//            'avatar' => $file,
//        ]);
//        // Assert the file was stored...
//        Storage::disk('avatars')->assertExists($file->hashName());
//
//        // Assert a file does not exist...
//        Storage::disk('avatars')->assertMissing('missing.jpg');
//    }

//    public function testCookies()
//    {
//        $response = $this->withCookie('color', 'blue')->get('/');
//
//        $response = $this->withCookies([
//            'color' => 'blue',
//            'name' => 'Taylor',
//        ])->get('/');
//    }


}
