<?php 

namespace App\Http\Service\Menu;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Session;

class MenuService
{
    //User
    public function show()
    {
        return Menu::select('name','id','thumb')
        ->where('parent_id',0)
        ->orderby('id')
        ->limit(6)
        ->get();
    }
    public function getId($id)
    {
        return Menu::where('id',$id)->Where('active',1)->firstOrFail();            //có thì hiện ra k thì lỗi 404 k tìm thấy
    }
    public function getProduct($menu,$request)
    {
        $query = $menu->products()->select('id','name','price','price_sale','thumb','description')
        ->where('active',1);
        if($request->input('price')){
            $query->orderBy('price',$request->input('price'));
        }
        return $query
        ->orderByDesc('id')
        ->simplePaginate(12)
        ->withQueryString();
    }
    public function getallProduct($request)
    {
        $query = Product::select('id','name','price','price_sale','thumb','description')
        ->where('active',1);
        if($request->input('price')){
            $query->orderBy('price',$request->input('price'));
        }
        return $query
        ->orderByDesc('id')
        ->simplePaginate(12)
        ->withQueryString();
    }

    //Admin
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }
    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request){
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'menu.'.$text;
            $file->move(public_path('uploads'),$file_name);
        }
        $request->merge(['thumb' => $file_name]);
        try{
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'thumb' => (string) $request->input('thumb'),
            ]);

            Session::flash('success','Tạo danh mục thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;      
    }
    public function update($request, $menu){
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $text = $request->file_upload->extension();
            $file_name = time().'-'.'menu.'.$text;
            $file->move(public_path('uploads'),$file_name);

            $request->merge(['thumb' => $file_name]);
        }
        // $menu->fil($request->input());      //fill quét toàn bộ thông tin request gửi lên
        // $menu->save();
        //cách làm thủ công:
        $menu->name = (string) $request->input('name');
        if($request->input('parent_id') != $menu->id){
            $menu->parent_id = (int) $request->input('parent_id');
        }
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->thumb = (string) $request->input('thumb');
        $menu->save();

        Session::flash('success','Cập nhật thành công danh mục');
        return true;
    }
    public function destroy($iddanhmuc){
        $menu = Menu::where('id',$iddanhmuc);
        if($menu){
            return Menu::where('id',$iddanhmuc)->orWhere('parent_id',$iddanhmuc)->delete();
        }
        return false;
    }
}