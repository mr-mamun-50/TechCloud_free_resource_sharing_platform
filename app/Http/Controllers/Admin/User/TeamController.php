<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = DB::table('team')->get();
        return view('admin.homepage_user.team', compact('team'));
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
        $validated = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'quote' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'quote' => $request->quote,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'github' => $request->github,
            'linkedin' => $request->linkedin
        ];
        $name_slug = Str::of($request->name)->slug('-');

        $image = $request->file('image');
        $input['image'] = 'TechCloud'.'_'.time().'-'.$name_slug.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/homepage');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(300, 300)->save($destinationPath.'/'.$input['image']);
        $data['image'] = $input['image'];

        DB::table('team')->insert($data);

        $notify = ['message'=>'Member successfully added!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
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
