<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;

class VideoTutorialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = DB::table('video_tutorials')
                    ->leftjoin('categories', 'video_tutorials.category_id', 'categories.id')
                    ->leftjoin('subcategories', 'video_tutorials.subcategory_id', 'subcategories.id')
                    ->select('video_tutorials.*', 'categories.category_name', 'subcategories.subcategory_name')
                    ->get();

        $category = DB::table('categories')->get();

        return view('admin.video_tutorial.index', compact('videos', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->get();

        return view('admin.video_tutorial.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = $request->video_link;
        if(substr($request->video_link, 0, 24) == "https://www.youtube.com/") {
            $link = substr("$request->video_link", 24);
        } else if(substr($request->video_link, 0, 17) == "https://youtu.be/") {
            $link = substr("$request->video_link", 17);
        }

        $validated = $request->validate([
            'video_title' => 'required',
            'subcategory_id' => 'required',
            'video_link' => 'required',
            'video_tags' => 'required',
        ]);
        $title_slug = Str::of($request->video_title)->slug('-');
        $data = [
            'title' => $request->video_title,
            'slug' => $title_slug,
            'category_id' => DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => Auth::guard('admin')->user()->id,
            'username' => Auth::guard('admin')->user()->name,
            'video_link' => $link,
            'post_date' => now('6.0').date(''),
            'tags' => $request->video_tags,
            'status' => $request->video_status,
        ];

        DB::table('video_tutorials')->insert($data);

        $notify = ['message'=>'New video successfully added!', 'alert-type'=>'success'];
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
        $category = DB::table('categories')->get();
        $video = DB::table('video_tutorials')->where('id', $id)->first();

        return view('admin.video_tutorial.edit', compact('category', 'video'));
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
        $link = $request->video_link;
        if(substr($request->video_link, 0, 24) == "https://www.youtube.com/") {
            $link = substr("$request->video_link", 24);
        } else if(substr($request->video_link, 0, 17) == "https://youtu.be/") {
            $link = substr("$request->video_link", 17);
        }

        $validated = $request->validate([
            'video_title' => 'required',
            'subcategory_id' => 'required',
            'video_link' => 'required',
            'video_tags' => 'required',
        ]);
        $title_slug = Str::of($request->video_title)->slug('-');
        $data = [
            'title' => $request->video_title,
            'slug' => $title_slug,
            'category_id' => DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => Auth::guard('admin')->user()->id,
            'username' => Auth::guard('admin')->user()->name,
            'video_link' => $link,
            'update_date' => now('6.0').date(''),
            'tags' => $request->video_tags,
            'status' => $request->video_status,
        ];

        DB::table('video_tutorials')->where('id', $id)->update($data);

        $notify = ['message'=>'Video successfully updated!', 'alert-type'=>'success'];
        return redirect()->route('videos.index')->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('video_tutorials')->where('id',$id)->delete();

        $notify = ['message'=>'Video successfully deleted!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
