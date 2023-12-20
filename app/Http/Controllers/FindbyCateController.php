<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class FindbyCateController extends Controller
{
    public function FindbyCate($id){
        $post = post::where('id',$id)->get();
        $categoryParent = category::where('parent_id',0)->get();
       return view('fe.findbycategory',compact('post','categoryParent'));
    }
}
