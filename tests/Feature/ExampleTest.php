<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


//    public function testBasicExample()
//    {
//        $response = $this->withHeaders([
//            'X-Header' => 'Value',
//        ])->json('POST', '/user', ['name' => 'Sally']);
//
//        $response
//            ->assertStatus(201)
//            ->assertJson([
//                'created' => true,
//            ]);
//    }
}
