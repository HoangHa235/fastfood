<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;
use App\Models\Product;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request, $id, $slug ='')
    {
        $menu = $this->menuService->getId($id);

        $products = $this->menuService->getProduct($menu,$request);
        
        return view('menu',[
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu
        ]);
    }
    public function getallproduct(Request $request)
    {
        $products = $this->menuService->getallProduct($request);
        
        return view('menu',[
            'title' => 'Tất cả sản phẩm',
            'products' => $products,
        ]);
    }
}
