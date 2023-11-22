<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\album;
use App\Models\category;
use App\Models\image;
use Exception;
use Illuminate\Http\Request;

class ImageController extends Controller 
{
    //
    public function list($id)
    {
        $list = image::where('album_id',$id)->get();
        $albumId = album::find($id);
        $albumname = $albumId->name;
        $category = category::all();
        return view('be.interface.image',compact('list', 'albumname','category','albumId'));
    }

    public function listall(){
        $list = image::all();
        $albumname = 'Tất cả';
        $category = category::all();
        $id=0;
        return view('be.interface.image',compact('list', 'albumname','category','id'));
    }
    public function add(Request $request)
    {
        try{
            $data=request()->all();
            unset($data['_token']);
            unset($data['insert']);
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
        }
        catch (Exception $exception){
            return redirect()->back()->with('error', 'thêm thát bị!');
        }
        return redirect()->back()->with('success', 'thêm thanh cong!');
    }

    public function edit(Request $request)
    {
      $data=request()->all();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
