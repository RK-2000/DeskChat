<?php

namespace App\Http\Controllers;

use App\Classes\UserManager;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditProfile;
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

    public function editProfilePost(Request $request)
    {   
        $request->validate([
            'email' => 'required|unique:users',
            // 'full_name' => 'required',
            // 'dob' => 'required',
            // 'phone' => 'required',
            // 'desciption' => 'required',
        ]);

        $user = User::where('id',Auth::id())->first();
        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->desciption = $request->desciption;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('dashboard')->with('message',"Profile was edited"); 
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('signIn');
    }


    
}
