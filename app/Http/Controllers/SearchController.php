<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    
    public function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Product::where('name','LIKE',"%{$query}%")
            ->get();
            $output = '<div class="dropdown-menu" style="display:block;">';
            foreach($data as $product)
            {
               $output .= '
               <a class="dropdown-item" href="/projectlaravel/san-pham/'.$product->id.'-'.Str::slug($product->name,'-').'.html" style="color: #d65106;"><img style="width: 50px;height: 50px;margin-right:5px" src="http://localhost/projectlaravel/public/uploads/'.$product->thumb.'">'.$product->name.'</a>              
               ';
            }
           $output .= '</div>';
           echo $output;
        }else{
            echo 'Không tìm thấy kết quả';
        }
    }
}
