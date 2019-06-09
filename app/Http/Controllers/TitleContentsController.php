<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TitleContents;

class TitleContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = TitleContents::first();
        return view('admin.title_contents.header_contents')->with('header',$header);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "hello from create";
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
            'mainTitle' => 'required',
            'title_Caption' => 'required',
            'call_To_Action_Text' => 'required'            
        ]);

        //create content table variable

        $titleContents = new TitleContents;
        $titleContents->main_title = $request->input('mainTitle');
        $titleContents->title_caption = $request->input('title_Caption');
        $titleContents->call_to_action_text = $request->input('call_To_Action_Text');

        $titleContents->save();

        /* return view('admin.title_contents.header_contents')->with('header',$header); */
        return redirect('admin.title_contents.header_contents')->with('flash_message_success', 'Added Successfully!');
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
        $header = TitleContents::find($id);
        return view('admin.title_contents.edit_header_contents')->with('header', $header);
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
            'mainTitle' => 'required',
            'title_Caption' => 'required',
            'call_To_Action_Text' => 'required'            
        ]);

        //update content table variable

        $titleContents = TitleContents::find($id);
        $titleContents->main_title = $request->input('mainTitle');
        $titleContents->title_caption = $request->input('title_Caption');
        $titleContents->call_to_action_text = $request->input('call_To_Action_Text');

        $titleContents->save();

        return redirect('admin/header_contents')->with('flash_message_success', 'Updated Successfully!');
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

    public function add(){
        return "hello from add";
    }
}
