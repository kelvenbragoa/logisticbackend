<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function index(){
        $notifications = auth()->user()->notifications;
        $notifications->markAsRead();
        return response()->json([
            'notifications'=>$notifications,
        ]);
    }
    public function updatenotification(){
        $notifications = auth()->user()->unReadNotifications;
        return response()->json([
            'notifications'=>$notifications,
        ]);
    }
}
