<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UsersController;
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

Route::get('/users',[UsersController::class,'FetchUsers']);
Route::post('/users',[UsersController::class,'AddUsers']);
Route::post('/todolist/{users_id}',[TodoController::class,'AddTodo']);
Route::get('/todolist',[TodoController::class,'FetchTodolist']);
Route::get('/todolist/{users_id}',[TodoController::class,'FetchTodoByUserId']);
Route::get('todolist/{users_id}/{id}',[TodoController::class,'FetchTodoById']);
Route::patch('todolist/{users_id}/{id}',[TodoController::class,'UpdateStatus']);
Route::delete('/users/{users_id}',[UsersController::class,'DeleteUsers']);
Route::delete('/todolist/{users_id}/{id}',[TodoController::class,'DeleteTodo']);

