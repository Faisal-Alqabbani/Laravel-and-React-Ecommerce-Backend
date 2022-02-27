<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
class UserController extends Controller
{
    public function User(){
        return Auth::user();
    }
}
