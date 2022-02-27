<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use DB;
use Auth;
use App\Models\User;
use App\Http\Requests\RestRequest;
use Illuminate\Support\Facades\Hash;
class RestController extends Controller
{
    public function ResetPassword(RestRequest $request){
        $email = $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);
        $emailCheck = DB::table('password_resets')
        ->where('email',$email)->first();
        $pinCheck = DB::table('password_resets')->where('token', $token); 
        if (!$emailCheck) {
            return response([
                "message" => "Email Not Found"
            ],401);
            # code...
        }
        if(!$token){
        return response([
            "message" => "Your Code Not Valid"
        ]);
        }
        
        //  now resest user's password
        DB::table('users')
        ->where("email", $email)
        ->update(['password' => $password]);
        // Delete the reset password 
        DB::table('password_resets')->where("email",$email)->delete();
        // reponse to the client 
        return response(["message" => "Password Changed successfully!"], 200);
    }
}
