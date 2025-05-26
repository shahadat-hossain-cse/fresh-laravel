<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class AuthController extends Controller
{
    public function registration(){
        
        return view('user.registration');
    }
    
    public function registration_submit(Request $request)
    {
        $user = new User();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->password = Hash::make($request->password);
        
        $user->save();
        
        return redirect()->back()->with('message','Registration Successfull'); 
        
    }
    public function login(){
        // echo Hash::make('vbadvf,jf'); 
        // echo "<br>";
        // echo md5('vbadvf,jf');
        // echo "<br>";
        // echo sha1('vbadvf,jf');
        // to make a hash for initial db use
        return view('user.login');
    }
    public function login_submit(Request $request)
    {
        $remember = !empty($request->remember)? true : false;
        // echo $request->email;
        // echo $request->password;
        
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember))
        {
            //  echo Auth::user()->user_type;
            //  echo Auth::user()->name;
            //return redirect('panel/dashboard');
            if(Auth::user()->user_type=="Super Admin")
            {
                return redirect('student/list');
            }
            else{
                return redirect('create');
            }
            
        }
        else 
        {
            return redirect()->back()->with('error','Invalid Email or Password'); 
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('user-login')); 
    }
}
