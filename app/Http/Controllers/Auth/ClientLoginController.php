<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use auth facade, attempt() method 
use Auth;

class ClientLoginController extends Controller
{
	//ALL guests not logged in as clients will be redirected
	public function __construct(){
		$this->middleware('guest:clients');
	}

    public function showLoginForm(){
    	return view('auth.client-login');
    }

    public function login(Request $request){

    	//validate form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//Attempt to log user in - verifies automatically!
    	$credentials=array(
    		'email' => $request->email,
    		'password' => $request->password,
    	);

    	$remember = $request->remember;

    	
    	if(Auth::guard('clients')->attempt($credentials, $remember)){

    		//if successful, redirect to their intended location
    		//intended-default
    		return redirect()->intended(route('client.dashboard'))->with('success', 'You are now logged in');
    	}

    	//if not, then redirect back to login with form data
    	return redirect()->back()->withInput($request->only('email','remember'));
    }
}
