<?php

namespace App\Http\Controllers;
use App\Interest;

use Illuminate\Http\Request;
use Auth;

class InterestsController extends Controller
{
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
            'interest' => 'required',
            
        ]);

        $lang = new Interest();
        $lang->interest = $request->input('interest');
        $lang->user_id = Auth::user()->id;
        $lang->save();

        $interests = Interest::select('id','interest', 'user_id')->where('user_id', '=', Auth::user()->id)->get(['id','interest','user_id']);

        return redirect()->route('profile.show', Auth::user()->id)->with('success','Programming language has been added!')
                                                                ->with(compact('interests'));
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
    public function destroy($id1, $id)
    {
        $lang = Interest::find($id);

        $lang->delete();

        return redirect()->route('profile.show', Auth::user()->id)->with('success','Interest has been successfully Deleted');
    }
}
