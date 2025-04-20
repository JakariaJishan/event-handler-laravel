<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventNotificationController extends Controller
{
    public function markAsRead()
    {
        Auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
