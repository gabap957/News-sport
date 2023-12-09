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
      try{
        $data = $request->all();
        unset($data['_token']);
        unset($data['insert']);
        $data['created_at'] = date('Y-m-d H:i:s');
        type::insert($data);
      }
      catch (\Exception $exception){
        return redirect()->back()->with('error', 'Sửa thất bại!');
      }
      return redirect(route('admin.type.list'))->with('success', 'Sửa thành công!');
    }

    public function edit(Request $request)
    {
       try {
        $data=$request->all();
        unset($data['_token']);
        unset($data['insert']);
        type::where('id', '=', $data['id'])->update($data);
       }
       catch (\Exception $exception){
        return redirect()->back()->with('error', 'Sửa thất baị!');
       }
       return redirect(route('admin.type.list'))->with('success', 'Sửa này thành công!');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
