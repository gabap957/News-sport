<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller implements ICRUD
{

    public function list()
    {
      return view('be.layout');
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
