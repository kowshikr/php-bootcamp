<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\usersController;
use \App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[usersController::class,'FetchUsers']);
Route::post('/users',[usersController::class,'AddUsers']);
Route::get('/todolist',[TodoController::class,'FetchTodolist']);
Route::get('/todolist/{user_id}',[TodoController::class,'FetchTodoByUserId']);
Route::get('todolist/{user_id}/{id}',[TodoController::class,'FetchTodoById']);
Route::patch('todolist/{user_id}/{id}',[TodoController::class,'UpdateStatus']);
Route::delete('/users/id',[usersController::class,'DeleteUsers']);
Route::delete('/todolist/{user_id}/{id}',[TodoController::class,'DeleteTodo']);

