<?php

namespace App\Http\Controllers;
use App\Link;

use Illuminate\Http\Request;
use Auth;

class LinksController extends Controller
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
            'link' => 'required',
            
        ]);

        $link = new Link();
        $link->link = $request->input('link');
        $link->user_id = Auth::user()->id;
        $link->save();

        $links = Link::select('id','link', 'user_id')->where('user_id', '=', Auth::user()->id)->get(['id','link','user_id']);

        return redirect()->route('profile.show', Auth::user()->id)->with('success','Personal Link has been added!')
                                                                ->with(compact('links'));
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
        $link = Link::find($id);
        $link->delete();
        return redirect()->route('profile.show', Auth::user()->id)->with('success','Link has been successfully Deleted');
    }
}
