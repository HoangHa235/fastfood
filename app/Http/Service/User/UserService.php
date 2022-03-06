<?php

namespace App\Http\Service\User;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class UserService
{
    public function getAll()
    {
        return User::orderByDesc('id')
        ->where('role','!=',2)
        ->paginate(15);
    }

    public function delete($id)
    {
        $result = User::where('id',$id);
        if($result){
            return User::where('id',$id)->delete();
        }
    }

    public function update($request,$user)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'sliders.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['thumb' => $file_name]);
        }
        try{
            $user->fill($request->input());
            $user->save();
            Session::flash('success','Cập nhật người dùng thành công');
        }catch(\Exception $err){
            Session::flash('error','Cập nhật slider lỗi');
            Log::info($err->getMessage());
            return false;
        }
       
        return true;
    }
}