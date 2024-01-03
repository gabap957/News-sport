<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\album;
use App\Models\category;
use App\Models\image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    //
    public function list($id)
    {
        $list = image::where('album_id', $id)->get();
        $albumId = album::find($id);
        $albumparent = album::find($albumId->parent_id)->first()->name;
        $album = album::all();
        $albumname = $albumId->name;
        return view('be.interface.image', compact('list', 'albumname', 'id', 'album', 'albumparent'));
    }

    public function listall()
    {
        $list = image::all();
        $album = album::all();
        $albumParent = '';
        $albumname = 'Tất cả';
        $id = 0;
        return view('be.interface.image', compact('list', 'albumname', 'album', 'id'));
    }
    public function add(Request $request)
    {
        try {
            $data = request()->all();
            unset($data['_token']);
            unset($data['insert']);
            $array = $data['image_id'];
            $mainImageName = time() . '1' . $array->getClientOriginalName();
            $array->storeAs('/album', $mainImageName, 'public');
            $urlImage = 'storage/album/' . $mainImageName;
            $album_id = $data['album_id'];
            $dataImage = [
                'name' => $array->getClientOriginalName(),
                'OriginalName' => $mainImageName,
                'path_url' => $urlImage,
                'album_id' => $album_id
            ];
            DB::table('images')->insert($dataImage);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'thêm thất bại!');
        }
        return redirect()->back()->with('success', 'thêm thành công!');
    }

    public function edit(Request $request)
    {
        try {
            $data = request()->all();
            unset($data['_token']);
            unset($data['insert']);
            $array = $data['image_id'];
            $mainImageName = time() . '1' . $array->getClientOriginalName();
            $array->storeAs('/album', $mainImageName, 'public');
            $urlImage = 'storage/album/' . $mainImageName;
            $dataImage = [
                'name' => $array->getClientOriginalName(),
                'OriginalName' => $mainImageName,
                'path_url' => $urlImage,
                'album_id' => $data['album_id']
            ];
            DB::table('images')->where('id', $data['id'])->update($dataImage);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Cập nhật thất bại!');
        }
        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    public function delete($id)
    {
        try{
            image::where('id',$id)->delete();
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }
}
