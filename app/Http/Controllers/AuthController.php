<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $userData = $request->only('email', 'password');

        if (Auth::attempt($userData)) {
            $user = Auth::user();
            session()->put('user_id', $user->id);
            session()->put('user_name', $user->name);
            return redirect()->route('home');
        } else {
            return redirect()->route('to.login')->with('loginError', 'Invalid email or password.');
        }
    }

    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {

        $validated = request()->validate([
            'email' => ['unique:App\Models\User,email']
        ]);

        if ($validated) {
            $object = new User;
            $object->name = $request->name;
            $object->email = $request->email;
            $object->password = Hash::make($request->password);
            $object->save();
            // dd($object);
            return redirect()->route('to.login')
                ->with('success', 'profil registered successfully');
        }else {
            return redirect()->route('register')->with('errorRegister','This email already used');
        }
    }

    public function logout( Request $request)
    {

        // dd(session('user_name'));
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('to.login');

    }
}
