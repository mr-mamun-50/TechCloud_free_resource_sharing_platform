<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('categories')->get();
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|unique:categories|max:255',
            'category_description' => 'required',
        ]);

        $data = [
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        ];
        DB::table('categories')->insert($data);

        $notify = ['message'=>'New category successfully added!', 'alert-type'=>'success'];
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
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
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
            'category_name' => 'required|max:255',
            'category_description' => 'required',
        ]);

        $data = [
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        ];
        DB::table('categories')->where('id', $id)->update($data);

        $notify = ['message'=>'Category successfully updated!', 'alert-type'=>'success'];
        return redirect()->route('category.index')->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        $notify = ['message'=>'Category deleted successfully!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
