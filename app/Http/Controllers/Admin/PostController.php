<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = post::all();
        return view('be.interface.post',compact('list'));
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
