<?php 

namespace App\Http\Service\Product;


use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active',1)->get();
    }
    protected function isValidPrice($request)
    {
        if($request->input('price')!= 0 && $request->input('price_sale')!= 0 
        && $request->input('price_sale')>= $request->input('price') )
        {
            Session::flash('error','Giá giảm phải nhỏ hơn giá gốc');

            return false;
        }
        if($request->input('price_sale')!= 0  && $request->input('price')== 0  )
        {
            Session::flash('error','Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function insert($request)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$text;
            $file->move(public_path('uploads'),$file_name);
        }
        $request->merge(['thumb' => $file_name]);
        //dd($request->all());
         $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice == false) return false;

       try{
             $request->except('_token');
             Product::create($request->all());

             Session::flash('success','Thêm sản phẩm thành công');
        }catch(\Exception $err){
             Session::flash('error','Thêm sản phẩm thất bại');

            Log::info($err->getMessage());
             return false;
        }
        return true;
    }

    public function get()
    {
        return Product::with('menu')->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['thumb' => $file_name]);
        }
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice == false) return false; 

        try{
            $product->fill($request->input());
            $product->save();
            Session::flash('success','Cập nhật thành công');
        }catch(\Exception $err){
            Session::flash('error','Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function delete($idproduct)
    {
        $product = Product::where('id',$idproduct)->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
}
