<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddTodo()
    {
        $response = $this->postJson('http://localhost:8000/api/todolist/1',['task_name'=>'playing','status'=>'PENDING']);


        $response->assertStatus(200)
            ->assertSee('Task has been added for 1');
    }

    public function testGetTodoByUserId()
    {
        $response = $this->get('http://localhost:8000/api/todolist/6');

        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                return $json->first(function ($json){
                    return $json->where('users_id', 6)
                        ->where('task_name', 'studying')
                        ->where('status', 'IN_PROGRESS')
                        ->etc();
                });
            });
    }

    public function testGetTodoById()
    {
        $response = $this->get('http://localhost:8000/api/todolist/6/4');

        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                return $json->first(function ($json){
                return $json->where('id', 4)
                    ->where('users_id', 6)
                    ->where('task_name', 'studying')
                    ->where('status', 'IN_PROGRESS')
                    ->etc();
                });
            });
    }

    public function testChangeStatus(){
        $response = $this->patchJson('http://localhost:8000/api/todolist/1/1',['status'=>'DONE']);

        $response->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                return $json->first(function ($json){
                    return $json->where('id', 1)
                        ->where('users_id', 1)
                        ->where('task_name', 'studying')
                        ->where('status', 'DONE')
                        ->etc();
                });
            });
    }

    public function testDeleteTodo(){
        $response = $this->delete('http://localhost:8000/api/todolist/1/6');

        $response->assertStatus(200)
            ->assertSee('Given Task id 6 is deleted for Useer id 1');

    }



}
