<?php 

namespace App\Http\Service\Recruit;

use App\Models\Recruit;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RecruitService
{
    public function insert($request)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'recruits.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['thumb' => $file_name]);
        }
        try{
            Recruit::create($request->input());
            Session::flash('success','Thêm tin tuyển dụng thành công');
        } catch(\Exception $err){
            Session::flash('error','Thêm tin tuyển dụng lỗi');
            Log::info($err->getMessage());
            return false;
        }  
        
        return true;
    }
    public function get()
    {
        return Recruit::orderByDesc('id')->paginate(15);
    }
    
    public function update($request, $recruit)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['thumb' => $file_name]);
        }
        try{
            $recruit->fill($request->input());
            $recruit->save();
            Session::flash('success','Cập nhật tin tuyển dụng thành công');
        }catch(Exception $err){
            Session::flash('error','Cập nhật tin tuyển dụng lỗi');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($idrecruit)
    {
        $recruit = Recruit::where('id',$idrecruit)->first();
        if($recruit){
            $recruit->delete();
            return true;
        }
        return false;
    }

    public function show()
    {
        return Recruit::where('active',1)
        ->orderByDesc('id')
        ->paginate(6);
    }

    public function getRecruit($id)
    {
        return Recruit::where('id',$id)
        ->where('active',1)
        ->firstOrFail();
    }
}