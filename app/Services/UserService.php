<?php

namespace App\Services;

use App\Models\User;
use App\Services\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserService implements UserServiceInterface{

    public function register(User $user){
        $user = $this->hashPassword($user);

        try {
            $appUser = $user->save();
            // dd($appUser);

            return [
                "user" => $appUser,
                "message" => "Succes",
                "status" => true
            ];
        } catch (\Exception $e) {
            return [
                "user" => $appUser,
                "message" => "Message : " . $e->getMessage(),
                "status" => false
            ];
        }
    }

    private function hashPassword(User $user): User{
        $user->password = HAsh::make($user->password);
        return $user;
    }

    public function login(Array $user){
        try {

            if(Auth::attempt($user, true)){
                $appUser = Auth::user();
            }
            return [
                "user" => $appUser,
                "message" => "Succes",
                "status" => true
            ];
        } catch (\Exception $e) {
            return [
                "user" => false,
                "message" => "Message : " . $e->getMessage(),
                "status" => false
            ];
        }


    }

    public function logout(){
        return Auth::logout();
    }

}
