<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class TutorialController extends Controller
{
    //__Article tutorials
    public function article_index() {

        $articles = DB::table('articles_tutorial')
        ->leftjoin('categories', 'articles_tutorial.category_id', 'categories.id')
        ->leftjoin('subcategories', 'articles_tutorial.subcategory_id', 'subcategories.id')
        ->select('articles_tutorial.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('status', 1)
        ->orderBy('id', 'DESC')
        ->get();

        $category = DB::table('categories')->get();

        $R1 = DB::table('articles_tutorial')->latest('post_date')->first();
        $R2 = DB::table('softwares')->latest('post_date')->first();
        $R3 = DB::table('designs')->latest('post_date')->first();
        $R4 = DB::table('video_tutorials')->latest('post_date')->first();

        return view('user.article_tutorials.index', compact('articles', 'category', 'R1', 'R2', 'R3', 'R4'));
    }

    public function article_view($id) {

        $article = DB::table('articles_tutorial')
        ->leftjoin('categories', 'articles_tutorial.category_id', 'categories.id')
        ->leftjoin('subcategories', 'articles_tutorial.subcategory_id', 'subcategories.id')
        ->select('articles_tutorial.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('articles_tutorial.id', '=', $id)
        ->first();

        $comment = DB::table('article_comments')
        ->leftjoin('users', 'article_comments.user_id', 'users.id')
        ->select('article_comments.*', 'users.user_image')
        ->where('post_id', $article->id)
        ->orderBy('id', 'DESC')
        ->paginate(3);

        $cntcmt = DB::table('article_comments')->where('post_id', $article->id)->count();

        $category = DB::table('categories')->get();
        $author = DB::table('users')->where('id', $article->user_id)->first();

        $R1 = DB::table('articles_tutorial')->latest('post_date')->first();
        $R2 = DB::table('softwares')->latest('post_date')->first();
        $R3 = DB::table('designs')->latest('post_date')->first();
        $R4 = DB::table('video_tutorials')->latest('post_date')->first();

        return view('user.article_tutorials.view', compact('article', 'category', 'author', 'comment', 'cntcmt', 'R1', 'R2', 'R3', 'R4'));
    }

    //__Article_comments
    public function comment_store(Request $request) {

        $validated = $request->validate([
            'comment' => 'required'
        ]);
        $data = [
            'post_id' => $request->post_id,
            'user_id' => Auth::user()->id,
            'username' => Auth::user()->name,
            'useremail' => Auth::user()->email,
            'comment' => $request->comment,
            'c_date' => now('6.0').date(''),
        ];

        DB::table('article_comments')->insert($data);

        $notify = ['message'=>'New article successfully added!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }


    // __Video tutorials
    public function video_index() {

        $videos = DB::table('video_tutorials')
        ->leftjoin('categories', 'video_tutorials.category_id', 'categories.id')
        ->leftjoin('subcategories', 'video_tutorials.subcategory_id', 'subcategories.id')
        ->select('video_tutorials.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('status', 1)
        ->orderBy('id', 'DESC')
        ->get();

        $category = DB::table('categories')->get();

        $R1 = DB::table('articles_tutorial')->latest('post_date')->first();
        $R2 = DB::table('softwares')->latest('post_date')->first();
        $R3 = DB::table('designs')->latest('post_date')->first();
        $R4 = DB::table('video_tutorials')->latest('post_date')->first();

        return view('user.video_tutorials.index', compact('videos', 'category', 'R1', 'R2', 'R3', 'R4'));
    }
}
