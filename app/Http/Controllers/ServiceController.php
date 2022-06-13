<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    //__Softwares__
    public function softwares() {

        $softwares = DB::table('softwares')
        ->leftjoin('categories', 'softwares.category_id', 'categories.id')
        ->leftjoin('subcategories', 'softwares.subcategory_id', 'subcategories.id')
        ->select('softwares.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(5);

        $category = DB::table('categories')->get();

        $R1 = DB::table('articles_tutorial')->latest('post_date')->first();
        $R2 = DB::table('softwares')->latest('post_date')->first();
        $R3 = DB::table('designs')->latest('post_date')->first();
        $R4 = DB::table('video_tutorials')->latest('post_date')->first();

        return view('user.softwares.index', compact('softwares', 'category', 'R1', 'R2', 'R3', 'R4'));
    }

    //__Designs__
    public function designs() {

        $designs = DB::table('designs')
        ->leftjoin('categories', 'designs.category_id', 'categories.id')
        ->leftjoin('subcategories', 'designs.subcategory_id', 'subcategories.id')
        ->select('designs.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(5);

        $category = DB::table('categories')->get();

        $R1 = DB::table('articles_tutorial')->latest('post_date')->first();
        $R2 = DB::table('softwares')->latest('post_date')->first();
        $R3 = DB::table('designs')->latest('post_date')->first();
        $R4 = DB::table('video_tutorials')->latest('post_date')->first();

        return view('user.designs.index', compact('designs', 'category', 'R1', 'R2', 'R3', 'R4'));
    }
}
