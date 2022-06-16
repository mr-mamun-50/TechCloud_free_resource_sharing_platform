<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = DB::table('about')->first();
        return view('admin.homepage_user.about', compact('about'));
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
        $validated = $request->validate([
            'qoi' => 'required',
            'qoib' => 'required',
            'description' => 'required',
            'sos' => 'required'
        ]);

        $data = [
            'qoi' => $request->qoi,
            'qoib' => $request->qoib,
            'description' => $request->description,
            'sos' => $request->sos,
        ];

        if($request->image) {

            if(File::exists(public_path('images/homepage/'). $request->old_image)) {
                File::delete(public_path('images/homepage/'). $request->old_image);
            }

            $image = $request->file('image');
            $input['image'] = 'TechCloud_'.time().'about_image.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/homepage');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(600, 500)->save($destinationPath.'/'.$input['image']);
            $data['image'] = $input['image'];
        }
        else {
            $data['image'] = $request->old_image;
        }

        DB::table('about')->where('id', $id)->update($data);

        $notify = ['message'=>'Information successfully updated!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
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
