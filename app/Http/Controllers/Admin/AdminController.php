<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class AdminController extends Controller implements ICRUD
{

    public function list()
    {
        $list =Admin::all();
        return view('be.user.list',compact('list'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request ->all();
            unset($data['_token']);
            $data['password'] = Hash::make($data['password']);
            Admin::create($data);
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','thêm thất bại!');
        }
        return redirect()->back()->with('succes','thêm thành công!');
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
