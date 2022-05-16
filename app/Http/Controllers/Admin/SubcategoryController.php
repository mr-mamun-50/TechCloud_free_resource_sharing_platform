<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('subcategories')
        ->leftjoin('categories', 'subcategories.category_id', 'categories.id')
        ->select('categories.category_name', 'subcategories.*')
        ->orderBy('id', 'DESC')
        ->get();

        $cat_data = DB::table('categories')->get();

        return view('admin.subcategory.index', compact('data', 'cat_data'));
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
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);

        $data = [
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>Str::of($request->subcategory_name)->slug('-'),
        ];
        DB::table('subcategories')->insert($data);

        $notify = ['message'=>'New subcategory successfully added!', 'alert-type'=>'success'];
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('subcategories')->where('id', $id)->first();
        $cat_data = DB::table('categories')->get();
        return view('admin.subcategory.edit', compact('data', 'cat_data'));
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
            'category_id' => 'required',
            'subcategory_name' => 'required|max:255',
        ]);

        $data = [
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>Str::of($request->subcategory_name)->slug('-'),
        ];
        DB::table('subcategories')->where('id', $id)->update($data);

        $notify = ['message'=>'Subcategory successfully updated!', 'alert-type'=>'success'];
        return redirect()->route('subcategory.index')->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();

        $notify = ['message'=>'Subcategory deleted successfully!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
