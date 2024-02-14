<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $userData = $request->only('email', 'password');
        
        if(Auth::attempt($userData)){
            $user = Auth::user();
            session()->put('user_id', $user->id);
            session()->put('user_first_name', $user->first_name);
            session()->put('user_last_name', $user->last_name);
            return view('home');
        }else{
            return redirect()->route('to.login');
        }
    }
}
