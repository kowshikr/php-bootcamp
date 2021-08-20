<?php

namespace App\Services;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserServices
{
    public function GetUsers(){
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
        if (DB::table('users')->where('id',$id)->exists()) {
            DB::table('users')->where('id', $id)->delete();
            return "User $id is deleted";
        }else{
            return "User $id does not exist";
        }
    }
}




