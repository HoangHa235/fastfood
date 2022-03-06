<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charts\UserChart;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        for($i=1;$i<=31;$i++){
        $totals = Customer::
        select('total','id')
        // ->where('id',$i)
        ->get();
        // dd($totals);
        $data = [];
        
            foreach($totals as $key=>$total){
                $data[] = 
                   $total['total']
                ;
           }
        }
        
        return view('admin.home',[
            'title'=>'Thống kê doanh thu',
            'data' =>$data
        ]);
    }
}
