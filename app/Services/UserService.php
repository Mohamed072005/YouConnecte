<?php

namespace App\Services;

use App\Models\User;



class UserService implements UserServiceInterface{
    public function register($name, $email, $password){
        $object = new User;
        $name = $object->name;
                // dd($object->name);

        $email = $object->email;
        $password = $object->password;
        $object->save();
        dd($object);

    }

}
