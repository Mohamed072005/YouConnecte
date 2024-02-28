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

    protected $userS;
    public function __construct(UserService $userS){
        $this->userS = $userS;
    }

    public function register(Request $request){
        $validated = request()->validate([
                    'email' => ['unique:App\Models\User,email'],
                    'password' =>['confirmed', 'required'],
                    'name' => ['required']
                ]);
        if($validated){
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $user = $this->userS->register($name, $email, $password);
            return redirect()->route('to.login')
            ->with('success', 'profil registered successfully');
        }
        else{
            return redirect()->route('register')->with('errorRegister','This email already used');
        }
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $userlogin = $this->userS->login($email, $password);

        if($userlogin == true){
            $user= Auth::user();
            session([
                        'user_id'=>$user->id,
                        'user_name'=>$user->name,
                    ]);
            return redirect()->route('home');

        }else{
            return redirect()->route('to.login')->with('loginError', 'Invalid email or password.');
        }
    }

    public function index()
    {
        return view('register');
    }


    public function logout( Request $request)
    {
        $request->session()->flush();
        $user= $this->userS->logout();
        return redirect()->route('to.login');
    }
}
