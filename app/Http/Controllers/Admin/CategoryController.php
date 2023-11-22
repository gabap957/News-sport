<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class CategoryController extends Controller implements ICRUD
{

    public function list()
    {
        $list = category::all();
      return view('be.interface.category',compact('list'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request ->all();
            unset($data['_token']);
            unset($data['insert']);
            $dataCate=category::create($data);
            $dataCateNew  = $dataCate->fresh();
            $dataAlbum = [
                'name' => $dataCateNew->name,
                'category_id'=>$dataCateNew['id'],
                'created_at'=>$dataCateNew['created_at'],
                'updated_at'=>$dataCateNew['updated_at']
            ];
            DB::table('albums')->insert($dataAlbum);
        }
        catch (Exception $exception){
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
            ];
            DB::table('categories')->where('id','=',$data['id'])->update($data);
            DB::table('albums')->where('category_id','=',$data['id'])->update($dataAlbum);
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
