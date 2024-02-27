<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;


class AuthController extends Controller
{

    // public function __construct(UserRepositoryInterface $UserRepository)
    //     {

    // }



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

    // public function register(Request $request)
    // {

    //     $validated = request()->validate([
    //         'email' => ['unique:App\Models\User,email']
    //     ]);

    //     if ($validated) {
    //         $object = new User;
    //         $object->name = $request->name;
    //         $object->email = $request->email;
    //         $object->password = Hash::make($request->password);
    //         $object->save();
    //         // dd($object);
    //         return redirect()->route('to.login')
    //             ->with('success', 'profil registered successfully');
    //     }else {
    //         return redirect()->route('register')->with('errorRegister','This email already used');
    //     }
    // }

        private $UserServicee;
        public function __construct(UserService $UserServicee ){
            $this->UserService = $UserServicee;
        }
        

        public function register(Request $request)
        { 
        $validated = request()->validate([
            'email' => ['required','unique:App\Models\User,email'],
            'password' => ['confirmed', 'required'],
            'name' => ['required']
        ]);            

        if($validated){          
          
            $name = $request->input('name');
            $email = $request->email;
            $password = Hash::make($request->password);
            // dd($password);
            

            $this->UserService->register($name, $email, $password);

            dd($UserService);

        return redirect()->route('to.login');
        }else{
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
