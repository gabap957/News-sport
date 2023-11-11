<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = image::all();
        return view('be.interface.image');
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
