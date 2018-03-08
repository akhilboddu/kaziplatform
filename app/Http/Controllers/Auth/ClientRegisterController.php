<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use auth facade, attempt() method 
use Auth;
use App\Client;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

class ClientRegisterController extends Controller
{

    protected $redirectPath = 'client/dashboard';

	//ALL guests not logged in as clients will be redirected
	public function __construct(){
		$this->middleware('guest:clients');
	}

    public function showRegisterForm(){
    	return view('auth.client-register');
    }

    public function register(Request $request){

    	//Validates data
        $this->validator($request->all())->validate();

       //Create seller
        $client = $this->create($request->all());

        //Authenticates seller
        $this->guard()->login($client);

       //Redirects sellers
        return redirect($this->redirectPath);

    }

    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'company_name' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    //Create a new client instance after a validation.
    protected function create(array $data)
    {
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'company_name' => $data['company_name'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //Get the guard to authenticate Seller
   protected function guard()
   {
       return Auth::guard('clients');
   }
}
