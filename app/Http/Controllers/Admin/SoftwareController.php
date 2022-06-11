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
