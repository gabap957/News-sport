<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\comment;
use App\Models\commentchildren;
use App\Models\post;
use Illuminate\Http\Request;

class GetPostbyIdController extends Controller
{
    public function GetpostbyId($id){
        $post = post::where('id',$id)->get();
        $comment = comment::where('post_id', $id)->get();
        foreach($comment as $key => $value){
            $commentchildren = commentchildren::where('comment_id',$value['id'])->get();
        }
        if(!isset($_COOKIE['post'.$id]) ){
            $post['0']['view'] = $post['0']['view']+1;
            $post['0']->save();
            setcookie('post'.$id, $id, time() + (86400 * 30));
        }
        $category = category::where('id',$post['0']['category_id'])->get();
        $categoryParent = category::where('parent_id',0)->get();

       return view('fe.postbyid',compact('post','categoryParent','category','comment','commentchildren'));
    }
    public function reply(Request $request){
        $id = $request->id;
        $comment = comment::where('id',$id)->get();
        if(count($comment)==0){
            $commentchild = commentchildren::where('commentParent_id',$id)->get();
            return response()->Json($commentchild,200);
        }
        return response()->Json($comment,200);
    }
}
