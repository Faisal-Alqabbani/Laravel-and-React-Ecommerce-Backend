<?php

namespace App\Http\Controllers\User;

use DB;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    //
    public function Login(Request $request){
    try{
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();
            $token = $user->createToken('app')->accessToken;
            return response([
                "message" => "Successfully login",
                'token' => $token,
                "user" => $user,
            ],200);
        }
        
    } catch (Exception $exception) {
        return response([
            'message' => $exception->getMessage()
        ],400);
    }
        return response([
        'message' => 'Invalid Email Or Password' 
        ],401);
    }

    //  Register Method
    public function Register(RegisterRequest $request){

    	try{
    		$user = User::create([
    			'name' => $request->name,
    			'email' => $request->email,
    			'password' => Hash::make($request->password) 
    		]);
    		$token = $user->createToken('app')->accessToken;

    		return response([
    			'message' => "Registration Successfull",
    			'token' => $token,
    			'user' => $user
    		],200);

	    	}catch(Exception $exception){
	    		return response([
	    			'message' => $exception->getMessage()
	    		],400);
	    	}
    } // end mehtod 
}
