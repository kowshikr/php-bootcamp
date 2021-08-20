<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\UserServices;
class UsersController extends Controller
{
    //
    protected $userServices;

    public function __construct( UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function fetchUsers(UserServices $userServices){
        return $userServices->GetUsers();
    }

    public function AddUsers(Request $request,UserServices $userServices){
        return $userServices->AddUsers($request);
    }

    public function DeleteUsers(string $id,UserServices $userServices){
        return $userServices->DeleteUsers($id);
    }
}
