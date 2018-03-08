<?php

namespace App\Http\Controllers;
use App\User;
use App\Invitation;
use App\Notifications\InvitationSent;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
    	// $user = User::first(); //notification to be sent to
     //    $invitation = Invitation::first(); //information that has to be sent through in the email
     //    $user->notify(new InvitationSent($invitation));
    	return view('pages.welcome');
    }

    public function howitworks(){
    	return view('pages.howitworks');
    }

    public function chat(){
    	return view('test');
    }
}
