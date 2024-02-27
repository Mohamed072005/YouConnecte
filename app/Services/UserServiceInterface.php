<?php

namespace App\Services;

interface UserServiceInterface{

    public function register($name, $email, $password);
    public function login($email, $password);
    public function logout();
}