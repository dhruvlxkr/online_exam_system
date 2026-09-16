<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loadRegister(){
        return view('register');
    }

    public function studentRegister(Request $request)
    {
        
        $request->validate([
            'name'=>'string|required|min:2',
            'email' => 'string|required|email|unique:users,email',
            'password'=>'string|required|confirmed|min:6'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','Regisration Successful! You can now login.');
    }
  
     public function loadLogin(){
        return view('login');
     }

     public function userLogin(Request $request){
        $request->validate([
            'email'=>'string|required|email',
            'password'=>'string|required'
        ]);

        $usercrediential = $request->only('email','password');
        if(Auth::attempt($usercrediential)){
             if(Auth::user()->is_admin == 1){
                 return redirect()->route('admin.dashboard');
             }else{
                 return redirect()->route('student.dashboard');
             }
        }else{
            return back()->with('error','Invalid Email or Password');
        }
     }
     
     public function userDashboard(){
        return view('student.dashboard');
     }

        public function adminDashboard(){
        return view('admin.dashboard');
     }

     public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return redirect('/');

     }

}
