<?php

namespace App\Http\Controllers\Admin;

use App\Models\notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    //Notification controller 
    public function GetAllNotification(){
        $result = notification::all();
        return $result;
    }
}
