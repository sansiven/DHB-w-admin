<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutContents;

class AboutContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AboutContents::first();
        return view('admin.about_contents.about_contents')->with('about',$about);
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
        $this->validate($request, [
            'aboutTitle' => 'required',
            'about_Caption' => 'required',
            'about_Content' => 'required'            
        ]);

        //create content table variable

        $aboutContents = new AboutContents;
        $aboutContents->about_title = $request->input('aboutTitle');
        $aboutContents->about_caption = $request->input('about_Caption');
        $aboutContents->about_content = $request->input('about_Content');

        $aboutContents->save();

        /* return view('admin.title_contents.header_contents')->with('header',$header); */
        return redirect('admin/about_contents/header_contents')->with('flash_message_success', 'Added Successfully!');
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
        $about = AboutContents::find($id);
        return view('admin.about_contents.edit_about_contents')->with('about', $about);
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
            'aboutTitle' => 'required',
            'about_Caption' => 'required',
            'about_Content' => 'required'            
        ]);

        //create content table variable

        $aboutContents = AboutContents::find($id);
        $aboutContents->about_title = $request->input('aboutTitle');
        $aboutContents->about_caption = $request->input('about_Caption');
        $aboutContents->about_content = $request->input('about_Content');

        $aboutContents->save();

        return redirect('admin/about_contents')->with('flash_message_success', 'Updated Successfully!');

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
