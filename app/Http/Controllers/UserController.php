<?php

namespace App\Http\Controllers;

use App\Classes\UserManager;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Function to display Create Account Page
    public function index(){
        return view('sign-up');
    }

    public function createAccountPost(CreateUserRequest $request){
        
        $user = ['name'=>$request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password) 
        ];
        // User Is Created
        if(UserManager::createAccount($user)){
            return redirect()->route('signIn');
        }
        $request->session()->flash('error','Try Again!');
        return back();
    }

    public function signIn(){
        
        return view('sign-in');
    }

    public function signInPost(LoginUserRequest $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->route("dashboard");
        }
        $request->session()->flash('error','Invalid Credentials');
        return back();
    }

    public function editProfile()
    {
        # code...
        $user = User::where('id',Auth::id())->first();
        if($user){
            return $user;
        }
        return;
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('signIn');
    }


    
}
