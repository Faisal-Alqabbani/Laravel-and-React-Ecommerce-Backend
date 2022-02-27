<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\ForgetMail;
class ForgetController extends Controller
{
     //
     public function ForgetPassword(Request $request){
        $email = $request->email;
        // check if the email doesnotexist in the table
        if (User::where("email",$email)->doesntExist()) {
            # code...
            return response([
                "message" => "Email is Invalid",
            ],401);
        }
        // Generate random token
        $token = rand(10,100000);
        try {
            //code...
            DB::table('password_resets')->insert([
                "email" => $email,
                "token" => $token
            ]);
            // Mail send to user. 
            Mail::to($email)->send(new ForgetMail($token)); 
            return response([
                "message" => "Reset Password Mail Send to your email"
            ], 200); 
        } catch(Exception $exception){
    		return response([
    			'message' => $exception->getMessage()
            ]); 
        }
    	
        
    } // end method
}
