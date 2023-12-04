<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\album;
use App\Models\category;
use Illuminate\Http\Request;

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
