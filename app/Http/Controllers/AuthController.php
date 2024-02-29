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
use App\utils\UserMapper;


class AuthController extends Controller
{

    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function register(Request $request){
        $validated = request()->validate([
                    'email' => ['unique:App\Models\User,email'],
                    'password' =>['confirmed', 'required'],
                    'name' => ['required']
                ]);
            
        $user = UserMapper::requestToUser($request);
        // dd($user);

        $response = $this->userService->register($user);
        // dd($response);

        if($response['status']){
            return redirect()->route('to.login')
                        ->with('success', 'profil registered successfully');
        }
        else{
            return redirect()->route('register')->with('errorRegister','This email already used');
        }
    }

    public function login(Request $request){
        $user = UserMapper::requestToLogin($request);
        // dd($user);
        $response = $this->userService->login($user);
        // dd($response);
        if($response['status'] == true){
            
                $userApp= Auth::user();
                    session([
                            'user_id'=>$userApp->id,
                            'user_name'=>$userApp->name,
                        ]);
                return redirect()->route('home');
                // dd($userApp);
        }
        else{
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
        $user= $this->userService->logout();
        return redirect()->route('to.login');
    }
}
