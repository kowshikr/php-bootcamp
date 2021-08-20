<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddUsers()
    {
        $response = $this->postJson('http://localhost:8000/api/users',['first_name'=>"vidya",'last_name'=>"K"]);

        $response->assertStatus(200)
            ->assertSee("User vidya is added");

    }
    public function testDeleteUsers(){
        $response = $this->delete('http://localhost:8000/api/users/10');
        $response->assertStatus(200)
            ->assertSee("User 10 is deleted");

    }

    public function testFetchUsers(){
        $response = $this->get('http://localhost:8000/api/users');

        $response->assertStatus(200)
            ->assertJsonCount(7);
    }
}
