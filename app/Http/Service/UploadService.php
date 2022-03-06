<?php 

namespace App\Http\Service;

class UploadService
{
    public function store($request){
        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'uploads/'.date("Y/m/d"), $name
            );

        }
    }
}