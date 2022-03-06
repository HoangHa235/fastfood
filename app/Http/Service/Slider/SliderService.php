<?php

namespace App\Http\Service\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function insert($request)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'sliders.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['thumb' => $file_name]);
        }
         try{
            //$request->except('_token');
            Slider::create($request->input());

            Session::flash('success','Thêm Slider mới thành công');
        } catch (\Exception $err){
            Session::flash('error','Thêm Slider mới thất bại');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Slider::orderByDesc('id')->paginate(15);
    }

    public function update($request, $slider)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'users.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['thumb' => $file_name]);
        }
        try{
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success','Cập nhật slider thành công');
        }catch(\Exception $err){
            Session::flash('error','Cập nhật slider lỗi');
            Log::info($err->getMessage());
            return false;
        }
       
        return true;
    }

    public function destroy($idslider)
    {
        $slider = Slider::where('id',$idslider)->first();
        if($slider){
            $path = str_replace('public','storage',$slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }

    public function show()
    {
        return Slider::where('active',1)->orderByDesc('sort_by')->get();
    }
}