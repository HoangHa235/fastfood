<?php 

namespace App\Helpers;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>' . $menu->id . '</td>
                        <td>' . $char . $menu->name . '</td>
                        <td>' . self::active($menu->active) . '</td>
                        <td>' . $menu->updated_at . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/projectlaravel/admin/menus/edit/' . $menu->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="/projectlaravel/admin/menus/destroy/'. $menu->id .'"
                                onclick="removeRow(' . $menu->id . ', \'/projectlaravel/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';
                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, $char . '|--');
            }
        }

        return $html;
    }

    public static function active($active = 0):string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs" >NO</span>' 
            : '<span class="btn btn-success btn-xs" >YES</span>';
    }

    public static function menus($menus,$parent_id = 0):string
    {
        $html = '';
        $html .= '<a class="dropdown-item" href="/projectlaravel/danh-muc/tatca.html">Tất cả</a>';
        foreach($menus as $key=> $menu){
            if($menu->parent_id == $parent_id){
                $html .='<a class="dropdown-item" href="/projectlaravel/danh-muc/'.$menu->id.'-'.Str::slug($menu->name, '-').'.html">'
                .$menu->name.'</a>';

                unset($menus[$key]);
                    // if(self::isChild($menus,$menu->id)){
                    //     $html.='<div class="dropdown-menu" aria-labelledby="dropdown-a"><a class="dropdown-item" href="reservation.html">';
                    //     $html.=$menu->name;
                    //     $html.='</a></div>';
                    // }
            }       //Str::slug biển khoản trống thành '-'
        }
        return $html;
    }

    public static function isChild($menus,$id) :bool
    {
        foreach ($menus as $menu){
            if($menu->parent_id== $id){
                 return true;
            }
        }
        return false;
    }
    public static function price($price = 0,$priceSale = 0)
    {
        if($priceSale != 0) return number_format($priceSale,0,'','.').' VNĐ';
        if($price != 0) return number_format($price,0,'','.').' VNĐ';

        return '<a href="/lien-he.html" style="color: red;">Liên hệ</a>';
    }
}
?>
