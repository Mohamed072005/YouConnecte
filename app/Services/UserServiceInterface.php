<?php

namespace App\Services;

use App\Models\User;

interface UserServiceInterface{

    public function register(User $user);
    public function login(Array $user);
    public function logout();
}