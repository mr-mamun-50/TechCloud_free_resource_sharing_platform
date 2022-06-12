<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function softwares() {

        $softwares = DB::table('softwares')
        ->leftjoin('categories', 'softwares.category_id', 'categories.id')
        ->leftjoin('subcategories', 'softwares.subcategory_id', 'subcategories.id')
        ->select('softwares.*', 'categories.category_name', 'subcategories.subcategory_name')
        ->where('status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(5);

        $category = DB::table('categories')->get();

        return view('user.softwares.index', compact('softwares', 'category'));
    }
}
