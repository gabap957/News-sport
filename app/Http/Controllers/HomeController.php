<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\image;
use App\Models\post;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;


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
            if(count($post[$key])==4){
                $tinNoibat=$post[$key];
            }   
        }
        return view('fe.home',compact('post','categoryParent','tindacbiet','tinNoibat'));
    }

    public function search(Request $request){
        $name = $request->name;
        $post =post::where('name','LIKE','%'.$name."%");
        dd($post);
        return response()->json($post,200);
    }
}
