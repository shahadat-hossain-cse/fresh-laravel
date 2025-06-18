<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ApiToken;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use Hash;
class TokenController extends Controller
{
    function login(Request $request) 
    {
        //$user = DB::table("users")->where('email',$request->email)->first();
        $user = User::where('email',$request->email)->first();
        //print_r($user);
        if ($user && Hash::check($request->password, $user->password)) 
        { 
            return response()->json($user, 200);
        } 
        else 
        {
            return response()->json(["message"=>"User not found"], 401);
        }
       
    }

    function get_token(Request $request)
    {
        //$user = DB::table("users")->where('email',$request->email)->first();
        //$user = User::where('email',$request->email)->first();
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Create token with expiration (1 hour)
        $token = Str::random(60);
        //$expiresAt = Carbon::now()->addHour();
        //$expiresAt = Carbon::now('Asia/Dhaka')->addMinute(15);
        //$expiresAt = date('Y-m-d H:i:s');
        $expiresAt = date('Y-m-d H:i:s',strtotime("+15 minutes", strtotime(date('Y-m-d H:i:s'))));

        ApiToken::create([
            'user_id'    => $user->id,
            'token'      => $token,
            'expires_at' => $expiresAt
        ]);

        return response()->json([
            'token'      => $token,
            'expires_at' => $expiresAt,
            'user'       => $user,
        ]);       
    }
    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        ApiToken::where('token', $token)->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
