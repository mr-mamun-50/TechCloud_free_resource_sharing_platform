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
        $validated = $request->validate([
            'article_title' => 'required',
            'subcategory_id' => 'required',
            'article_description' => 'required',
            'article_tags' => 'required',
        ]);
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

        $image = $request->file('article_thumb');
        $input['article_thumb'] = time().'-'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('images/articles');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(600, 360)->save($destinationPath.'/'.$input['article_thumb']);
        // $destinationPath = public_path('uploads');
        // $image->move($destinationPath, $input['article_thumb']);

        $data['image'] = $input['article_thumb'];

        DB::table('articles_tutorial')->insert($data);

        $notify = ['message'=>'New article successfully added!', 'alert-type'=>'success'];
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
