<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use Auth;
use App\Cluster;
use App\Invitation;

class ClustersController extends Controller
{
    // *
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
     
    //Displays cluster dashboard for users who dont belong to a cluster yet
    public function index()
    {
        return view('cluster.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //showing the page to create the cluster
    public function create()
    {
        return view('cluster.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slogan' => 'required',
        ]);

        //create and submit input data into DB (save data)
        $cluster = new Cluster();
        $cluster->name = $request->input('name');
        $cluster->slogan = $request->input('slogan');
        $cluster->save();
        
        Auth::user()->cluster_id = $cluster->id;
        Auth::user()->update();

        return redirect('/student/explore')->with('success', 'Cluster Created! Explore some opportunities!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //showing the cluster
    public function show($id)
    {
        $cluster = Cluster::find($id);
        $members = User::select('name', 'email', 'id','cover_image','headline')->where('cluster_id', '=', Auth::user()->cluster->id)->get(['name','email','id','cover_image','headline']);
        return view('cluster.dashboard')->with('cluster', $cluster)
                                        ->with(compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cluster = Cluster::find($id);
        $members = User::select('name', 'email', 'id')->where('cluster_id', '=', Auth::user()->cluster->id)->get(['name','email','id']);
        // dd(compact('members')); //debug

        return view('cluster.edit')->with('cluster', $cluster)
                                    ->with(compact('members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'slogan' => 'required',
        ]);

        //create and submit input data into DB (save data)
        $cluster = Cluster::find($id);
        $cluster->slogan = $request->input('slogan');
        $cluster->save();

        return redirect('/student/cluster')->with('success', 'Cluster Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewsearch(){
        $members = User::select('name', 'email', 'id')->where('cluster_id', '=', Auth::user()->cluster->id)->get(['name','email','id']);
        return view('cluster.search')->with(compact('members'));
    }

    public function autocomplete(Request $request)
    {
        // $data = User::select("name", "email")->where("name","LIKE","%{$request->input('query')}%")->get();

        $data = User::select("name", "email", "id")->where("name","LIKE","%{$request->input('query')}%")->get(['name','email','id']);
        return response()->json($data);
    }       
    

















}
