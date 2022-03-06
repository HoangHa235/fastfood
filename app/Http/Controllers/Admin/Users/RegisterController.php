<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.users.register',[
            'title' => 'Đăng kí'
        ]);
    }

    public function store(Request $request)
    {
            $file = $request->image;
            $text = $request->image->extension();
            $file_name = time().'-'.'users.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['avata' => $file_name]);

         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->address = $request->address;
         $user->phone = $request->phone;
         $user->password = bcrypt($request->password);
         $user->avata = $request->avata;
         $user->role =1;
         $user->save();

         if($user->id){
             return redirect()->route('login');
         }
    }
}
