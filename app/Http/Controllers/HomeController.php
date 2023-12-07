<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\image;
use App\Models\post;


class HomeController extends Controller
{
    public function home(){
        $categoryParent = category::where('parent_id',0)->get();
        $post = post::ORDERBY('id','DESC')->limit(5)->get();
        return view('fe.home',compact('post','categoryParent'));
    }
}
