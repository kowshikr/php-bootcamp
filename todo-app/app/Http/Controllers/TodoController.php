<?php

namespace App\Http\Controllers;

use App\Services\TodoServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //
    protected $todoServices;

    public function __construct( TodoServices $todoServices)
    {
        $this->todoServices= $todoServices;
    }

    public function AddTodo(Request $request,string $users_id,TodoServices $todoServices){
        return $todoServices->AddTodo($request,$users_id);
    }

    public function FetchTodolist(TodoServices $todoServices){
        return $todoServices->GetTodolist();
    }

    public function FetchTodoByUserId(string $users_id,TodoServices $todoServices){
        return $todoServices->GetTodoByUserId($users_id);
    }

    public function FetchTodoById(string $users_id,string $id,TodoServices $todoServices){
        return $todoServices->GetTodoById($users_id,$id);
    }

    public function UpdateStatus(Request $request,string $users_id,string $id,TodoServices $todoServices){
        return $todoServices->ChangeStatus($request,$users_id,$id);
    }

    public function DeleteTodo(string $users_id,string $id,TodoServices $todoServices){
       return $todoServices->DeleteTodo($users_id,$id);
    }
}
