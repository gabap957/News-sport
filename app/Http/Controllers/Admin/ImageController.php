<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\album;
use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller 
{
    //
    public function list($id)
    {
        $list = image::where('album_id',$id)->get();
        $albumname = album::where('id',$id)->get()->first()->name;
        return view('be.interface.image',compact('list', 'albumname'));
    }

    public function listall(){
        $list = image::all();
        $albumname = 'Tất cả';
        return view('be.interface.image',compact('list', 'albumname'));
    }
    public function add(Request $request)
    {
        // TODO: Implement add() method.
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
