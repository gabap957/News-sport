<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class GetPostbyIdController extends Controller
{
    public function GetpostbyId($id){
        $post = post::where('id',$id)->get();
        $categoryParent = category::where('parent_id',0)->get();
       return view('fe.postbyid',compact('post','categoryParent'));
    }
}
