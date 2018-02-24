<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    
	public function markAllAsRead(){

		Auth::user()->unreadNotifications->markAsRead();

		return Redirect::back();

	}

	public function getAllNotifications(){

		return view('layouts.notification.index');

	}

}
