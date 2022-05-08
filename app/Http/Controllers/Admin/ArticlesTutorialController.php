<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;

class ArticlesTutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('categories')->get();

        return view('admin.articles_tutorial.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->get();

        return view('admin.articles_tutorial.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'article_title' => 'required',
        //     'subcategory_id' => 'required',
        //     'article_description' => 'required',
        //     'article_tags' => 'required',
        // ]);
        $title_slug = Str::of($request->article_title)->slug('-');
        $data = [
            'title' => $request->article_title,
            'slug' => $title_slug,
            'category_id' => DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => Auth::guard('admin')->user()->id,
            'username' => Auth::guard('admin')->user()->name,
            'description' => $request->article_description,
            'post_date' => now('6.0').date(''),
            'tags' => $request->article_tags,
            'status' => $request->article_status,
        ];
        $thumb = $request->article_thumb;
        if($thumb) {
            $thumbname = $title_slug.'.'.$thumb->getClientOriginalExtension();
            Image::make($thumb)->resize(600, 360)->save("public/media/".$thumbname);
            $data['image'] = "public/media/".$thumbname;

            DB::table('articles_tutorial')->insert($data);

            $notify = ['message'=>'New article successfully added!', 'alert-type'=>'success'];
            return redirect()->back()->with($notify);
        }
        // return  response()->json($data);

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
