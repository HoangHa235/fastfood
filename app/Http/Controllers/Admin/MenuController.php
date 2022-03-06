<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;
use GrahamCampbell\ResultType\Result;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create(){
        return view('admin.menu.add',[
            'title'=>'Thêm danh mục',
            'menus' => $this->menuService->getParent(),
        ]);
    }

    public function store(CreateFormRequest $request){
        $this->menuService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view('admin.menu.list',[
            'title' => 'Danh sách danh mục mới nhất',
            'menus' => $this->menuService->getAll(),
        ]);
    }

    public function show(Menu $menu){
        return view('admin.menu.edit',[
            'title' => 'Chỉnh sửa danh mục '.$menu->name,
            'menus' => $this->menuService->getParent(),             //lấy danh mục cha
            'menu' => $menu
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request){     //CreateFormRequest để validate form
        $this->menuService->update($request,$menu);

        return redirect('/admin/menus/list');
    }

    public function destroy($iddanhmuc)
    {
        $result = $this->menuService->destroy($iddanhmuc);
         if($result){
             return redirect('admin/menus/list');
         }
    }
}
