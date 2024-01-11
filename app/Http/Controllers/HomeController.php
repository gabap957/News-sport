<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\image;
use App\Models\post;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function home(){
        $categoryParent = category::where('parent_id',0)->get();
        $post = post::get()->groupBy('type_id');
        foreach ($post as $key => $value) {
            if(count($post[$key])==1){
                $tindacbiet=$post[$key];
            }
            else{
                $tindacbiet=[];
            }
            if(count($post[$key])<=4){
                $tinNoibat=$post[$key];
            }
            else{
                $tinNoibat=[];
            }
        }
        $categoryMain = category::
        whereNotIn('id', function ($query) {
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
        $post = DB::table('posts as p')
        ->join('images as i', 'p.image_id', '=', 'i.id')
        ->select('p.*', 'i.path_url')
        ->where('p.name','LIKE','%'.$name."%")
        ->get();
        return response()->json($post,200);
    }
    public function GetpostbyId($id){
        $post = post::where('id',$id)->get();
        return response()->json($post,200);
    }
    public function profile(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['insert']);
            if(isset($data['image'])){
                unset($data['avatar']);
                $path  = $data['image'];
                $name = time().$path->getClientOriginalName();
                $path->storeAs('/avatar', $name, 'public');
                $urlImage= 'storage/avatar/' . $name;
                $data['avatar'] = $urlImage;
                unset($data['image']);
            }
                User::where('id','=',$data['id'])->update($data);
        }
        catch(Exception $e) {
            return redirect()->back()->with('error','Cập nhật thất bại');
        }
        return redirect()->back()->with('success','Cập nhật thành công');
    }
}
