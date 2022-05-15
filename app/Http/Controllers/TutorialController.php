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
        ->paginate(3);

        $category = DB::table('categories')->get();

        return view('article_tutorial', compact('articles', 'category'));
    }
}
