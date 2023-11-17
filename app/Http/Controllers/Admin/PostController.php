<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\image;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PostController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = post::all();
        $categories = category::all();
        // dd($list);
        return view('be.interface.post', compact('list','categories'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['insert']);
            $array = $data['image'];
            $mainImageName = time().'1'.$array->getClientOriginalName();
            $array->storeAs('/album', $mainImageName, 'public');
            $urlImage= 'storage/album/' . $mainImageName;
            $dataImage = [
                'name' => $array->getClientOriginalName(),
                'OriginalName' => $mainImageName,
                'path_url' => $urlImage,
                'album_id' => $data['category_id']
            ];
            DB::table('images')->where('album_id', '=', $data['category_id'])->insert($dataImage);
            // DB::table('posts')->insert($data);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'thêm thất bại!');
        }
        return redirect()->back()->with('success', 'thêm thành công!');
    }

    public function edit(Request $request)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
