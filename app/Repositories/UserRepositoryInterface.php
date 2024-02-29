<?php

namespace App\Repositories;

interface UserRepositoryInterface{
    
    public function register(User $user);
    public function login($email, $password);
    public function logout();
    
}