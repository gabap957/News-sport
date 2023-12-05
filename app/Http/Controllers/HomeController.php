<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $category = category::all();
        $categorParent = category::where('parent_id',0)->get();
        $post = DB::table('posts')->get()->groupBy('category_id');
        dd($post);
        return view('fe.home',compact('category','post','categorParent'));
    }
}
