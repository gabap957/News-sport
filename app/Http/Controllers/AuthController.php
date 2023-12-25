<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            if (User::where('email', $data['email'])->first()) {
                return redirect()->back()->with('error','Email đã tồn tại trong hệ thống');
            }
            $data['password'] = Hash::make($data['password']);
            $data['level'] = 2;
            User::create($data);
        }
        catch (Exception $exception){
            return redirect()->back()->with('error','Đăng ký thất bại');
        }
        return redirect()->back()->with('success','Đăng ký thành công');
    }
}
