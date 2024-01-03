<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\album;
use App\Models\image;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function list()
    {
        $list=album::where('parent_id',0)->get();
        return view('be.interface.albums',compact('list'));
    }

    public function dolist($id, Request $request)
    {
        $albumByid = album::where('id',$id)->first();
        $listparent = album::where('parent_id',$id)->get();
        if(count($listparent)>0){
            return view('be.interface.albumsByid',compact('listparent','albumByid'));
        }else{
            $list = image::where('album_id', $id)->get();
            $albumparent = '';
            $album = album::all();
            $albumname = $albumByid->name;
            return view('be.interface.image',compact('albumByid','albumparent','albumname','list','album','id'));
        }
    }
}
