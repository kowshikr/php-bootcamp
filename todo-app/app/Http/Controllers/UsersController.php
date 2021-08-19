<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function fetchUsers(){
        $users= DB::table("users")->get();
        return $users;
    }

    public function AddUsers(Request $request){
        DB::table('users')->insert([
            'first_name'=>$request->get('first_name'),
            'last_name' => $request->get('last_name')
        ]);
        return "User $request->first_name is added";
    }

    public function DeleteUsers(string $id){
        DB::table('users')->where('id',$id)->delete();
        return "User $id is deleted";
    }
}
