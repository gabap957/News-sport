<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function viewLogin(){
        return view('be.login.loginAdmin');
    }
    public function login(Request $request){
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.user.list');
        }
        return back();
    }
}
