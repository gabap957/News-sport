<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;

class HomeController extends Controller
{
    public function home(){
        $category = category::all();
        $categorParent = category::where('parent_id',0)->get();
        $post = post::all();
        return view('fe.home',compact('category','post','categorParent'));
    }
}
