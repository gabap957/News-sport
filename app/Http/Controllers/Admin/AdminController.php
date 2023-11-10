<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller implements ICRUD
{

    public function list()
    {
        return view('be/layout');
    }

    public function add()
    {
        // TODO: Implement add() method.
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
