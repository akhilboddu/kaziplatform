<?php

namespace App\Http\Controllers;

use App\Job;
use App\Client;
use App\User;
use Auth;
use App\Invitation;

use App\Notifications\InvitationSent;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.dashboard');
    }

    //NOTIFICATIONS ARE HAPPENING FROM HERE
    public function welcome()
    {
        return view('student.welcome');
    }

    public function student_help(){
        return view('student.help');
    }

    public function explore(){
        $jobs = Job::orderBy('created_at','desc')->paginate(5);
        return view('student.explore')->with('jobs', $jobs);
    }

    public function leaderboard(){
        
        return view('student.cluster-leaderboard');
    }

    public function showjob($id){
        $job = Job::find($id);
        return view('student.showjob')->with('job', $job);
    }


    public function profile($id){
        $user = User::find($id);
        return view('student.profile')->with('user',$user);
    }

    public function editprofile($id){
        $user = User::find($id);
        return view('student.editprofile')->with('user',$user);
    }

    public function updateprofile(Request $request, $id){

        //validation, pass request and array of rules
        $this->validate($request, [
            'name' => 'required',
            'headline' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        ini_set('memory_limit','256M');
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
            $path = $request->file('cover_image')->storeAs('public/students/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'default.jpg';
        }


        $user = User::find($id);

        if($user->name != $request->input('name')){
            $user->name = $request->input('name');
        }

        if($user->headline != $request->input('headline')){
            $user->headline = $request->input('headline');
        }
        
       
        
        if($request->hasFile('cover_image')){
            if($user->cover_image != 'default.jpg'){
                //delete image
                Storage::delete('public/students/cover_images/'.$user->cover_image);
            }
            $user->cover_image = $fileNameToStore;
        }

        $user->save();

        return redirect()->route('student.profile')->with('success','Profile has been Updated');

    }

    

















    
}
