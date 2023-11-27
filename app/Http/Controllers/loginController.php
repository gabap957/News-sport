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
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'level'=>1])){
            return redirect()->route('admin.user.list');
        }
        return back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
