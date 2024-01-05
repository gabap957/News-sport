<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function viewLogin(){
        return view('authentication.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'level'=>1])){
            return redirect()->route('admin.user.list')->with('success','Đăng nhập với quyền quản trị viên');
        }
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'level'=>2])){
            return redirect()->route('home')->with('success','Đăng nhập thành công!');
        }
        return back()->with('error','Email hoặc mật khẩu không chính xác!');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
