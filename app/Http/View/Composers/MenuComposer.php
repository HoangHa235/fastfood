<?php

namespace App\Http\View\Composers;

use App\Models\Menu;

use Illuminate\View\View;


class MenuComposer
{
    
    protected $users;

    public function __construct()
    {
        
    }

    public function compose(View $view)  //Trả về menu 
    {
        $menus = Menu::select('id','name','parent_id')->where('active',1)->orderBy('id')->get();
        
        $view->with('menus',$menus); //with truyền data $menus ra View
    }
}