<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //
    public function FetchTodolist(){
        return DB::table('todolist')->get();
    }

    public function FetchTodoByUserId(string $users_id){
        return DB::table('todolist')->where('users_id',$users_id)->get();
    }

    public function FetchTodoById(string $users_id,string $id){
        return DB::table('todolist')->where(['users_id'=>$users_id,'id'=>$id])->get();
    }

    public function UpdateStatus(Request $request,string $users_id,string $id){
        return DB::table('todolist')->where(['users_id'=>$users_id,'id'=>$id])->update(['status'=>$request->get('status')]);
    }

    public function DeleteTodo(string $users_id,string $id){
        return DB::table('todolist')->where(['users_id'=>$users_id,'id'=>$id])->delete();
    }
}
