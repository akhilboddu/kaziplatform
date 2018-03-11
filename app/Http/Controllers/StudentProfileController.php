<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Experience;
use App\Language;
use App\Job;
use App\Client;
use App\User;
use Auth;
use App\Interest;

class StudentProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $experiences = Experience::select('id','company_name', 'user_id', 'position','duration','description', 'link','cover_image')->where('user_id', '=', Auth::user()->id)->get(['id','company_name','user_id','position','duration','description', 'link','cover_image']);
        $languages = Language::select('id', 'language', 'user_id')->where('user_id', '=', Auth::user()->id)->get(['id', 'language','user_id']);
        $interests = Interest::select('id','interest', 'user_id')->where('user_id', '=', Auth::user()->id)->get(['id','interest','user_id']);
        return view('student.profile')->with('user', $user)
                                    -> with(compact('experiences'))
                                    -> with(compact('languages'))
                                    -> with(compact('interests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('student.editprofile')->with('user', $user);
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

        return redirect()->route('profile.show', Auth::user()->id)->with('success','Profile has been Updated');
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
