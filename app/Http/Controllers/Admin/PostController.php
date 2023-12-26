<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\image;
use App\Models\post;
use App\Models\type;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

use PHPUnit\Exception;

class PostController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = post::all();
        $categories = category::all();
        return view('be.interface.post.post', compact('list','categories'));
    }
    public function doadd(){
        $categories = DB::table('categories')
        ->whereNotIn('id', function ($query) {
            $query->select('c1.id')
                ->from('categories as c1')
                ->join('categories as c2', 'c1.id', '=', 'c2.parent_id');
        })
        ->get();
        $type = type::all();
        return view('be.interface.post.post-add', compact('categories','type'));
    }
    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $url = asset('images/'. $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $typeId = $data['type_id'];;
            $data['user_id']= FacadesAuth::user()->id;
            unset($data['_token']);
            unset($data['insert']);
            //add image
            $array = $data['image_id'];
            $mainImageName = time().'1'.$array->getClientOriginalName();
            $array->storeAs('/album', $mainImageName, 'public');
            $urlImage= 'storage/album/' . $mainImageName;
            $cate_id=$data['category_id'];
            $dataImage = [
                    'name' => $array->getClientOriginalName(),
                    'OriginalName' => $mainImageName,
                    'path_url' => $urlImage,
                    'album_id' => $cate_id
                ];
            $id = image::insertGetId($dataImage);
            $data['image_id'] = $id;
            //add type
            $typeData = type::find($typeId)->quantity;
            $postOfType = post::where('type_id', $typeId)->get();
           if(count($postOfType) >= ($typeData)){
                $postOfType[0]->update(['type_id' => '1']);
                DB::table('posts')->insert($data);
            }
            else{
                DB::table('posts')->insert($data);
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'thêm thất bại!');
        }
        return redirect(route('admin.post.list'))->with('success', 'thêm thành công!');
    }

    public function doedit($id){
        $list=post::find($id);
        $categories=category::all();
        $type = type::all();
        return view('be.interface.post.post-edit', compact('list','categories','type'));
    }
        public function edit(Request $request)
    {
       try {
        DB::beginTransaction();
        $data = $request->all();
        unset($data['_token']);
        unset($data['insert']);
        $typeId = $data['type_id'];
        if(isset($data['image_upload'])){
             $array = $data['image-upload'];
            $mainImageName = time().'1'.$array->getClientOriginalName();
             $array->storeAs('/album', $mainImageName, 'public');
             $urlImage= 'storage/album/' . $mainImageName;
             $cate_id=$data['category_id'];
             $dataImage = [
                 'name' => $array->getClientOriginalName(),
                    'OriginalName' => $mainImageName,
                   'path_url' => $urlImage,
                 'album_id' => $cate_id,
                 'updated_at' => date('Y-m-d H:i:s')
             ];
                 $id = $data['image_id'];
                 image::where('id', '=',$id )->update($dataImage);
             unset($data['image-upload']);
        }
        else{
            unset($data['image_upload']);
        }
        //update type
            $typeData = type::find($typeId)->quantity;
            $postOfType = post::where('type_id', $typeId)->get();
           if(count($postOfType) >= ($typeData)){
                $postOfType[0]->update(['type_id' => '1']);
                DB::table('posts')->where('id', '=', $data['id'])->update($data);
            }
            else{
                DB::table('posts')->where('id', '=', $data['id'])->update($data);
            }
            DB::commit();
       }
       catch (Exception $exception) {
           DB::rollBack();
           return redirect()->back()->with('error', 'Sửa thất bại!');
       }
       return redirect(route('admin.post.list'))->with('success', 'Sửa thành công!');
    }

    public function delete($id)
    {
        try{
            post::where('id',$id)->delete();
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }
}
