<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ICRUD;
use App\Models\album;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class AlbumController extends Controller implements ICRUD
{
    public function list()
    {
        $list=album::all();
        $categories = category::all();
        return view('be.interface.albums',compact('list', 'categories'));
    }

    public function add(Request $request)
    {
       try { $data=$request->all();
        unset($data['_token']);
        unset($data['insert']);
        DB::table('albums')->insert($data);
       }
       catch (Exception $exception){
           return redirect()->back()->with('error','Thêm thất bại!');
       }
       return redirect()->back()->with('success','Thêm thành công!');
    }

    public function doAdd($id, \Illuminate\Support\Facades\Request $request)
    {
        // TODO: Implement doAdd() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function doEdit($id, \Illuminate\Support\Facades\Request $request)
    {
        // TODO: Implement doEdit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
