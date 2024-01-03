<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class CategoryController extends Controller implements ICRUD
{

    public function list()
    {
        $list = category::where('parent_id',0)->get();
      return view('be.interface.category',compact('list'));
    }

    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request ->all();
            unset($data['_token']);
            unset($data['insert']);
            $parent_id = $data['parent_id'];
            $dataCate = category::create($data);
            $dataCateNew = $dataCate->fresh();
            $dataAlbum = [
                'name' => $dataCateNew->name,
                'category_id'=>$dataCateNew['id'],
                'parent_id'=>$dataCateNew['parent_id'],
                'created_at'=>$dataCateNew['created_at'],
                'updated_at'=>$dataCateNew['updated_at']
            ];
            DB::table('albums')->insert($dataAlbum);
            if($parent_id){
                $post= post::where('category_id', $parent_id)->get();
                 if(count($post)>0){
                     DB::table('posts')->where('category_id', $parent_id)->update(['category_id' => $dataCateNew['id']]);
                     DB::table('images')->where('album_id', $parent_id)->update(['album_id' => $dataAlbum['id']]);
                 }
             }
            DB::commit();
        }
        catch (Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error','thêm thất bại!');
        }
        return redirect()->back()->with('success','thêm thành công!');
    }

    public function edit(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['insert']);
            $dataAlbum = [
                'name' => $data['name'],
                'parent_id'=>$data['parent_id'],
            ];
            DB::table('categories')->where('id','=',$data['id'])->update($data);
            DB::table('albums')->where('category_id','=',$data['id'])->update($dataAlbum);
            if($data['parent_id']){
                $post= post::where('category_id', $data['parent_id'])->get();
                 if(count($post)>0){
                     DB::table('posts')->where('category_id', $data['parent_id'])->update(['category_id' => $data['id']]);
                     DB::table('images')->where('album_id', $data['parent_id'])->update(['album_id' => $data['id']]);
                 }
                }


        }
        catch (\Exception $exception){
            return redirect()->back()->with('error','sửa thất bại!');
        }
        return redirect()->back()->with('success','Sửa thanh cong!');
    }

    public function delete($id)
    {

        try{
            category::where('id',$id)->delete();
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }
}
