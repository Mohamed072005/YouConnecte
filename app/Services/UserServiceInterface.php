<?php

namespace App\Services;

use App\Models\User;

interface UserServiceInterface{

    public function register(User $user);
    public function login(User $user);
    public function logout();
}