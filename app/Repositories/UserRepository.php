<?php

namespace App\Repositories;

use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface{

    public function register($user){


    $user = new User;
    $user->name = $name;
    $user->email = $email;
    $user->password = $password;
    return $user->save();

    }
    public function login($email, $password){
        
    }
}