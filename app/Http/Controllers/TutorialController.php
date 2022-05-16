<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TutorialController extends Controller
{
    public function article_index() {

        $articles = DB::table('articles_tutorial')
        ->leftjoin('categories', 'articles_tutorial.category_id', 'categories.id')
        ->leftjoin('subcategories', 'articles_tutorial.subcategory_id', 'subcategories.id')
        ->select('articles_tutorial.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(5);

        $category = DB::table('categories')->get();

        return view('user.article_tutorials.index', compact('articles', 'category'));
    }

    public function article_view($id) {
        $article = DB::table('articles_tutorial')
        ->leftjoin('categories', 'articles_tutorial.category_id', 'categories.id')
        ->leftjoin('subcategories', 'articles_tutorial.subcategory_id', 'subcategories.id')
        ->select('articles_tutorial.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('articles_tutorial.id', '=', $id)
        ->first();

        $category = DB::table('categories')->get();
        $author = DB::table('users')->where('id', $article->user_id)->first();

        return view('user.article_tutorials.view', compact('article', 'category', 'author'));
    }
}
