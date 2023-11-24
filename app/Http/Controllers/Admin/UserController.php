<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class UserController extends Controller implements ICRUD
{

    public function list()
    {
        $list =User::all();
        return view('be.user.list',compact('list'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request ->all();
            unset($data['_token']);
            unset($data['insert']);
            $data['password'] = Hash::make($data['password']);
            DB::table("users")->insert($data);
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','thêm thất bại!');
        }
        return redirect()->back()->with('success','thêm thành công!');
    }



    public function delete($id)
    {

        try{
            Admin::where('id',$id)->delete();
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }

    public function edit(Request $request)
    {
        try {
            $data = $request->all();
            $user = Admin::find($data['id']);
            $data['password'] = Hash::make($data['password']);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->phone = $data['phone'];
            $user->save();
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','Sửa thất bại!');
        }
        return redirect()->back()->with('success','Sửa thành công!');
    }
}
