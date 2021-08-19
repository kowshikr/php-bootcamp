<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //
    public function AddTodo(Request $request,string $users_id){
        DB::table('todolist')->insert([
            'users_id'=>$users_id,
            'task_name'=>$request->get('task_name'),
            'status'=>$request->get('status'),
        ]);
        return "Task has been added for $users_id";
    }

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

        DB::table('todolist')->where(['users_id'=>$users_id,'id'=>$id])->update(['status'=>$request->get('status')]);
        return DB::table('todolist')->where(['users_id'=>$users_id,'id'=>$id])->get();
    }

    public function DeleteTodo(string $users_id,string $id){
        return DB::table('todolist')->where(['users_id'=>$users_id,'id'=>$id])->delete();
    }
}
