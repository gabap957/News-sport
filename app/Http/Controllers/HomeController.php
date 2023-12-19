<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function home(){
        $categoryParent = category::where('parent_id',0)->get();
        $post = DB::table('posts')->get()->groupBy('type_id');
        foreach ($post as $key => $value) {
            $post[$key] = $value;
            if(count($post[$key])==1){
                $tindacbiet=$post[$key];
            }
        }

        $tinNoibat= $post[3];
        $categoryMain = DB::table('categories')
        ->whereNotIn('id', function ($query) {
            $query->select('c1.id')
                ->from('categories as c1')
                ->join('categories as c2', 'c1.id', '=', 'c2.parent_id');
        })
        ->get();
        $postNews = post::orderBy('created_at','desc')->take(12)->get();
        return view('fe.home',compact('post','categoryParent','tindacbiet','tinNoibat','categoryMain','postNews'));
    }

    public function search(Request $request){
        $name = $request->name;
        $post =post::where('name','LIKE','%'.$name."%")->get();
        return response()->json($post,200);
    }
    public function GetpostbyId($id){
        $post = post::where('id',$id)->get();
        return response()->json($post,200);
    }
}
