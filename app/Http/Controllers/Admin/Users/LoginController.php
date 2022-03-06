<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        @session_start();
    }
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng nhập'
        ]);
    }
    public function store(Request $request){
         $this->validate($request,[
         'email' => 'required|email:rfc,dns',
         'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ],$request->input('remember'))){
            if(Auth::user()->role ==2){
                return redirect()->route('admin');
            }else{
                return redirect()->route('home.index');
            }
                           
        }

           Session::flash('error','Tài khoản hoặc mật khẩu không đúng');
            return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}

