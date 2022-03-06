<?php 

namespace App\Http\Service\Product;

use App\Models\Product;

class ProductService
{
    const LIMIT = 9;  //giới hạn số sản phẩm hiển thị ở menu

    public function get()
    {
        return Product::select('id','name','description','price','price_sale','thumb')
            ->orderByDesc('id')
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Product::where('id',$id)
        ->where('active',1)
        ->with('menu')
        ->firstOrFail();
    }
    public function more($id)
    {
        return Product::select('id','name','description','price','price_sale','thumb')
        ->where('active',1)
        ->where('id','!=',$id)
        ->orderByDesc('id')
        ->limit(3)
        ->get();
    }
}