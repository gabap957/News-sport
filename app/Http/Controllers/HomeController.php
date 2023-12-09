<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\image;
use App\Models\post;
use GuzzleHttp\Psr7\Request;


class HomeController extends Controller
{
    public function home(){
        $categoryParent = category::where('parent_id',0)->get();
        $post = post::ORDERBY('id','DESC')->limit(5)->get();
        return view('fe.home',compact('post','categoryParent'));
    }

    public function search(Request $request){
        $name = $request->name;
        $post =post::where('name','LIKE','%'.$name."%");
        dd($post);
        return response()->json($post,200);
    }
}
