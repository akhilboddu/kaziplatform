<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\Client;
use App\Application;
use App\Cluster;
use App\User;

use App\Notifications\ApplicationSent;

class ApplicationsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:clients');
    }


    /**
     * Display list of jobs that have been applied for.
     * To be able to list the jobs, we use applications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $client = Auth::guard('clients')->user(); 
        // $jobs = $client->jobs; //gets all jobs posted by client

        // $applications = [];

        // foreach($jobs as $job){
        //     $applications = Application::where('job_id', $job->id)->get();

        //     foreach ($applications as $application) {
        //         $title = Job::find($application->job_id)->title;
        //         $cluster_name = Cluster::find($application->cluster_id)->name;
        //         $devs = User::where('cluster_id', '=', $application->cluster_id)->get();
        //         return $devs;
        //     }
            
        // }    

        // return view('client.viewapplications')->with(compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     Send Application event:
     Create application object
     Send in the notification to client
    */
    public function store(Request $request)
    {

        //Grabbing relevant details 
        $cluster = Auth::user()->cluster; //cluster
        $job_id = (int)$request->route('job');
        $job = Job::find($job_id); // job
        $client_id =  $job->client_id; //client
        $client = Client::find($client_id);

        //get member names of cluster into string
        $members = User::where('cluster_id', $cluster->id)->get();
        $size = sizeof($members);

        $s = '';
        for($i = 0; $i < $size; $i++) {
            if($i != $size-1)
                $s .= $members[$i]->name . ',';
            else
                $s .= $members[$i]->name;
        }

        


        //create Application object in the database
        $application = new Application();
        $application->cluster_id = $client_id;
        $application->job_id = $job_id;
        $application->job_title = $job->title;
        $application->cluster_name = $cluster->name;
        $application->cluster_members = $s;
        $application->status = 'sent';
        $application->save();
        
        //notify client about sending request
        $client->notify(new ApplicationSent($application, $cluster, $job, $client));

        return 'success';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
