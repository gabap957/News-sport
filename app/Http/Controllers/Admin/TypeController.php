<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\type;
use Illuminate\Http\Request;

class TypeController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = type::all();
        return view('be.interface.type',compact('list'));
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
