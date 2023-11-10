<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller implements ICRUD
{
    //
    public function list()
    {
        return view('be.layout');
    }

    public function add()
    {
        // TODO: Implement add() method.
    }

    public function doAdd($id, Request $request)
    {
        // TODO: Implement doAdd() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
