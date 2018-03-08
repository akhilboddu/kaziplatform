<?php

namespace App\Http\Controllers;

use App\Client;
use Auth;
use App\Job;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:clients');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $client_id = Auth::guard('clients')->user()->id;
        $client = Client::find($client_id);
        return view('client.dashboard')->with('jobs',$client->jobs);
    }

    public function welcome(){
        return view('client.welcome');
    }

    public function client_help(){
        return view('client.help');
    }

    public function kazi_terms(){
        return view('client.kazi-terms');
    }

    public function home(){
        return view('client.home');
    }
























}
