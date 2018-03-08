<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Job;
use App\Client;
use Auth;
use Illuminate\Support\Facades\Storage;

class JobsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:clients');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation, pass request and array of rules
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'budget' => 'required',
            'delivery_time' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        
        if($request->hasFile('cover_image')){
            //Get file name with the extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name - just php
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename tostore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/jobs/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }


        $job = new Job();
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->budget = $request->input('budget');
        $job->delivery_time = $request->input('delivery_time');
        $job->client_id = Auth::guard('clients')->user()->id;
        $job->cover_image = $fileNameToStore;
        $job->status = 'created';
        $job->save();

        return redirect()->route('client.dashboard')->with('success','Job has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        return view('client.jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);

        //check for correct user
        if(Auth::guard('clients')->user()->id !== $job->client_id){
            return redirect()->route('client.dashboard')->with('error','Unauthorized Page');
        }

        return view('client.jobs.edit')->with('job',$job);
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
        //validation, pass request and array of rules
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'budget' => 'required',
            'delivery_time' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with the extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name - just php
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename tostore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/jobs/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }


        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->budget = $request->input('budget');
        $job->delivery_time = $request->input('delivery_time');
        $job->client_id = Auth::guard('clients')->user()->id;
        
         if($request->hasFile('cover_image')){
            if($job->cover_image != 'noimage.jpg'){
                //delete image
                Storage::delete('public/jobs/cover_images/'.$job->cover_image);
            }
            $job->cover_image = $fileNameToStore;
        }

        $job->save();

        return redirect()->route('client.dashboard')->with('success','Job has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        //check for correct user
        if(Auth::guard('clients')->user()->id !== $job->client_id){
            return redirect()->route('client.dashboard')->with('error','Unauthorized Page');
        }

        if($job->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/jobs/cover_images/'.$job->cover_image);
        }

        $job->delete();

        return redirect()->route('client.dashboard')->with('success','Job has been successfully Deleted');
    }
}
