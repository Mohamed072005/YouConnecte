<?php 

namespace App\utils;

use Illuminate\Http\Request;
use App\Models\User;

class UserMapper {

    
    public static function requestToUser(Request $request) : User{
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        return $user;
    }

    
}