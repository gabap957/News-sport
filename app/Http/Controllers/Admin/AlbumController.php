<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\album;
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
        $list=album::where('parent_id',$id)->get();
        $albumByid =album::where('id',$id)->first();
        return view('be.interface.albumsByid',compact('list','albumByid'));
    }
}
