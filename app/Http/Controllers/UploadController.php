<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('article_thumb')) {
            // $file = $request->file('article_thumb');
            // $filename = $file->getClientOriginalName();
            // $folder = uniqid() . '-' . now()->timestamp;
            // $file->storeAs('fpond/tmp'.$folder, $filename);

            // return $folder;

            return "done";
        }
        return '';
    }
}
