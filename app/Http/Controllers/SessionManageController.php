<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use Hash;
class SessionManageController extends Controller
{
    function login()
    {
        return view('session.login');
    }
    function login_submit(Request $request)
    {
        // $username = $request->input('username');
        // $request->session()->put('username', $username);
        // //echo session('username');
        // //session(['uname' => $username]); // for array       
        // echo session('uname');
        // return redirect('session_profile');  

        $remember = !empty($request->remember)? true : false;
        $user = DB::table("users")->where('email',$request->email)->first();
        print_r($user);
        
        if ($user && Hash::check($request->password, $user->password)) 
        {
            session([
                'id' => $user->id, 
                'name' => $user->name,
                'email' => $user->email,
                'user_type' => $user->user_type
            ]);
        } else {
            return redirect()->back()->with('error','Invalid Email or Password'); 
        }
       
    }
    function session_check()
    {
        if(session('name'))
        {
            echo session('name');
        }
        
        
    }
    function logout()
    {
        //session()->pull('uname'); //to pull and remove
        //session()->forget('uname'); // Forget a single key...
        //session()->forget(['name', 'status']); // Forget multiple keys..
        session()->flush(); // remove all session data

        //return redirect('session_profile');
    }
    function flash_submit(Request $req)
    {
        //return "add user function";
        $username = $req->input('username');
        if($username=="sdt")
        {
            $req->session()->flash('status', 'Authentication successful!');
        }
        else
        {
            $req->session()->flash('status', 'Invalid Credentials');
        }
        return view('session.flash-form');
    }
}
