<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class CategoryController extends Controller implements ICRUD
{

    public function list()
    {
        $list = category::all();
      return view('be.interface.category',compact('list'));
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

    public function edit(Request $request)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
