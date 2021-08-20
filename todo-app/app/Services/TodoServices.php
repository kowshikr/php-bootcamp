<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TodoServices
{
    public function AddTodo(Request $request,string $users_id){
        if (DB::table('users')->where('id',$users_id)->exists()){
            DB::table('todolist')->insert([
                'users_id'=>$users_id,
                'task_name'=>$request->get('task_name'),
                'status'=>$request->get('status'),
            ]);
            return "Task has been added for $users_id";
        } else{
            return "Given User id $users_id does not exist";
        }
    }

    public function GetTodolist(){
        return DB::table('todolist')->get();
    }

    public function GetTodoByUserId(string $users_id){
        if (DB::table('users')->where('id',$users_id)->exists()) {
            return DB::table('todolist')->where('users_id', $users_id)->get();
        } else{
            return "Given User id $users_id does not exist";
        }
    }

    public function GetTodoById(string $users_id,string $id){
        if (DB::table('users')->where('id',$users_id)->exists()) {
            if (DB::table('todolist')->where(['users_id' => $users_id, 'id' => $id])->exists()) {
                return DB::table('todolist')->where(['users_id' => $users_id, 'id' => $id])->get();
            }else{
                return "Given Task id $id is not present for User id $users_id";
            }
        } else{
            return "Given User id $users_id does not exist";
        }
    }

    public function ChangeStatus(Request $request,string $users_id,string $id){
        if (DB::table('users')->where('id',$users_id)->exists()) {
            if (DB::table('todolist')->where(['users_id' => $users_id, 'id' => $id])->exists()) {
                DB::table('todolist')->where(['users_id' => $users_id, 'id' => $id])->update(['status' => $request->get('status')]);
                return DB::table('todolist')->where(['users_id' => $users_id, 'id' => $id])->get();
            }else{
                return "Given Task id $id is not present for User id $users_id";
            }
        }else{
            return "Given User id $users_id does not exist";
        }
    }

    public function DeleteTodo(string $users_id,string $id){
        if (DB::table('users')->where('id',$users_id)->exists()) {
            if (DB::table('todolist')->where(['users_id' => $users_id, 'id' => $id])->exists()) {
                DB::table('todolist')->where(['users_id' => $users_id, 'id' => $id])->delete();
                return "Given Task id $id is deleted for Useer id $users_id";
            }else{
                return "Given Task id $id is not present for User id $users_id";
            }
        }else{
            return "Given User id $users_id does not exist";
        }
    }
}
