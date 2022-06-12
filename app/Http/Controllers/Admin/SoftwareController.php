<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softwares = DB::table('softwares')
        ->leftjoin('categories', 'softwares.category_id', 'categories.id')
        ->leftjoin('subcategories', 'softwares.subcategory_id', 'subcategories.id')
        ->select('softwares.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->orderBy('id', 'DESC')
        ->get();

        $category = DB::table('categories')->get();

        return view('admin.software.index', compact('softwares', 'category'));
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
            'subcategory_id' => 'required',
            'subcategory_id' => 'required',
            'soft_file' => 'required',
            'thumb' => 'required',
            'tags' => 'required',
        ]);

        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'name' => $request->name,
            'slug' => $name_slug,
            'category_id' => DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => Auth::guard('admin')->user()->id,
            'username' => Auth::guard('admin')->user()->name,
            'useremail' => Auth::guard('admin')->user()->email,
            'description' => $request->description,
            'post_date' => now('6.0').date(''),
            'tags' => $request->tags,
            'status' => $request->status,
        ];

        $file = $request->file('soft_file');
        $input['soft_file'] = 'TechCloud'.'_'.time().'-'.$name_slug.'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('softwares');
        $file->move($destinationPath, $input['soft_file']);
        $data['soft_file'] = $input['soft_file'];


        $image = $request->file('thumb');
        $input['thumb'] = 'TechCloud_'.time().'-'.$name_slug.'_thumb.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/thumbnails');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(600, 360)->save($destinationPath.'/'.$input['thumb']);
        $data['thumb'] = $input['thumb'];

        DB::table('softwares')->insert($data);

        $notify = ['message'=>'New software successfully added!', 'alert-type'=>'success'];
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
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'name' => $request->name,
            'slug' => $name_slug,
            'category_id' => DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => Auth::guard('admin')->user()->id,
            'username' => Auth::guard('admin')->user()->name,
            'useremail' => Auth::guard('admin')->user()->email,
            'description' => $request->description,
            'update_date' => now('6.0').date(''),
            'tags' => $request->tags,
            'status' => $request->status,
        ];

        if($request->soft_file) {

            if(File::exists(public_path('softwares/'). $request->old_soft_file)) {
                File::delete(public_path('softwares/'). $request->old_soft_file);
            }

            $file = $request->file('soft_file');
            $input['soft_file'] = 'TechCloud'.'_'.time().'-'.$name_slug.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('softwares');
            $file->move($destinationPath, $input['soft_file']);
            $data['soft_file'] = $input['soft_file'];
        }
        else {
            $data['soft_file'] = $request->old_soft_file;
        }

        if($request->thumb) {

            if(File::exists(public_path('images/thumbnails/'). $request->old_thumb)) {
                File::delete(public_path('images/thumbnails/'). $request->old_thumb);
            }

            $image = $request->file('thumb');
            $input['thumb'] = 'TechCloud_'.time().'-'.$name_slug.'_thumb.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/thumbnails');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(600, 360)->save($destinationPath.'/'.$input['thumb']);
            $data['thumb'] = $input['thumb'];
        }
        else {
            $data['thumb'] = $request->old_thumb;
        }

        DB::table('softwares')->where('id', $id)->update($data);

        $notify = ['message'=>'Software successfully updated!', 'alert-type'=>'success'];
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
        $software = DB::table('softwares')->where('id', $id)->first();
        if(File::exists(public_path('softwares/'). $software->soft_file)) {
            File::delete(public_path('softwares/'). $software->soft_file);
        }
        if(File::exists(public_path('images/thumbnails/'). $software->thumb)) {
            File::delete(public_path('images/thumbnails/'). $software->thumb);
        }
        DB::table('softwares')->where('id',$id)->delete();

        $notify = ['message'=>'Software successfully deleted!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
