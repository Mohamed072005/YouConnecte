<?php

namespace App\Services;

use App\Models\User;
use App\Services\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserService implements UserServiceInterface{
    public function register($name, $email, $password){
        $object = new User;
        $object->name = $name;
        $object->email = $email;
        $object->password = Hash::make($password);
        $object->save();
        // dd($object);
        return $object;
    }
    public function login($email, $password){
        
       return Auth::attempt([
        'email'=> $email,
        'password'=> $password,
       ]);
    }

    public function logout(){

    }

}
