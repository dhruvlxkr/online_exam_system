<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\PasswordReset;
use Mail;
use Illiminate\Support\Facades\Str;
use Illiminate\Support\Facades\URL;
use Illiminate\Support\Carbon\Carbon;

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

     public function forgotPassword(){
        return view('forgot-password');
     }

     public function resetPassword(Request $request){

       try{

       $user =User::where('email',$request->email)->get();

       if(Count($user) > 0){
          $token = Str::random(60);
          $domain = URL::to('/');
          $url = $domain.'/reset-password?token='.$token;

          $data['url'] = $url;
          $data['email'] = $request->email;
          $data['title'] = 'Passwprd Reset';
          $data['body'] = 'Please Click on below link to reset your passowrd';

          Mail::send('forgotPasswordMail',['data'=>$data],function($message) use ($data){
              $message->to($data['email'])->subject($data['title']);
          });


       }else{
           return back()->with('error','User not found'); 
       }

       }catch(\Exception $e){
         return back()->with('error',$e->getMessage());
       }
        $request->validate([
            'email'=>'string|required|email|exists:users,email'
        ]);


     }

}
