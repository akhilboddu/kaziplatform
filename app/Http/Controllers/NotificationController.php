<?php

namespace App\Http\Controllers;
use App\Notification;
use App\Invitation;
use Auth;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function get(){
    	$notification = Auth::user()->unreadNotifications;
    	return $notification;
    }

    public function clientget(){
        // return Notification::all();
        $notification = Auth::guard('clients')->user()->unreadNotifications;
        return $notification;
    }

    public function accept(Request $request){

    	$user = Auth::user();
    	$user->cluster_id = $request->cluster_id;
    	$user->save();

        $requests = Invitation::where('receiver_id', '=', Auth::user()->id)->update(['status' => 'accepted']);

    	$user->unreadNotifications()->find($request->id)->markAsRead();


    	return 'success';
    }

    public function reject(Request $request){

        Invitation::where('receiver_id', '=', Auth::user()->id)->update(['status' => 'declined']);
        Auth::user()->unreadNotifications()->find($request->id)->markAsRead();

        return 'success';
    }
}
