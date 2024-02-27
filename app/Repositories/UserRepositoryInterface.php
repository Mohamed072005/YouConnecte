<?php

namespace App\Repositories;

interface UserRepositoryInterface{
    
    public function register($name, $email, $password);
    public function login($email, $password);
    public function logout();
    
}