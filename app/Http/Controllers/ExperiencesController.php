<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Experience;
use Auth;

use Illuminate\Support\Facades\Storage;

class ExperiencesController extends Controller
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
        //validation, pass request and array of rules
        $this->validate($request, [
            'company' => 'required',
            'position' => 'required',
            'duration' => 'required',
            'link' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999',
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
            $path = $request->file('cover_image')->storeAs('public/students/experiences', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'briefcase.png';
        }


        $exp = new Experience();
        $exp->company_name = $request->input('company');
        $exp->position = $request->input('position');
        $exp->duration = $request->input('duration');
        $exp->link = $request->input('link');
        $exp->user_id = Auth::user()->id;
        $exp->cover_image = $fileNameToStore;
        $exp->description = $request->input('description');
        $exp->save();

        $experiences = Experience::select('company_name', 'user_id', 'position','duration','description', 'link','cover_image')->where('user_id', '=', Auth::user()->id)->get(['company_name','user_id','position','duration','description', 'link','cover_image']);
        $languages = Language::select('id','language', 'user_id')->where('user_id', '=', Auth::user()->id)->get(['id','language','user_id']);

        return redirect()->route('profile.show', Auth::user()->id)->with('success','Experience has been added!')
                                                                ->with(compact('experiences'))
                                                                ->with(compact('languages'));
    
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
    public function edit($id, $id2)
    {
        
        $exp = Experience::find($id2);
        
        return view('student.experience.edit')->with('exp', $exp);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id1, $id)
    {
        
        //validation, pass request and array of rules
        $this->validate($request, [
            'company' => 'required',
            'position' => 'required',
            'duration' => 'required',
            'link' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999',
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
            $path = $request->file('cover_image')->storeAs('public/students/experiences', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'briefcase.png';
        }


        $exp = Experience::find($id);
       
        $exp->company_name = $request->input('company');
        $exp->position = $request->input('position');
        $exp->duration = $request->input('duration');
        $exp->link = $request->input('link');
        $exp->user_id = Auth::user()->id;
        
        if($request->hasFile('cover_image')){
            if($exp->cover_image != 'briefcase.png'){
                //delete image
                Storage::delete('public/students/experiences/'.$exp->cover_image);
            }
            $exp->cover_image = $fileNameToStore;
        }

        $exp->description = $request->input('description');
        $exp->save();

        $experiences = Experience::select('id','company_name', 'user_id', 'position','duration','description', 'link','cover_image')->where('user_id', '=', Auth::user()->id)->get(['id','company_name','user_id','position','duration','description', 'link','cover_image']);

        return redirect()->route('profile.show', Auth::user()->id)->with('success','Experience has been added!')
                                                                ->with(compact('experiences'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id1, $id)
    {
        $exp = Experience::find($id);

        

        if($exp->cover_image != 'briefcase.png'){
            //delete image
            Storage::delete('public/students/experiences/'.$exp->cover_image);
        }

        $exp->delete();

        return redirect()->route('profile.show', Auth::user()->id)->with('success','Experience has been successfully Deleted');
    }






}
