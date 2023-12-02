<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $category = category::all();
        $post = post::all();
        return view('fe.home',compact('category','post'));
    }
}
