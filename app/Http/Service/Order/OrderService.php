<?php

namespace App\Http\Service\Order;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use GrahamCampbell\ResultType\Result;

class OrderService
{
    public function get()
    {
        return Customer::where('id_user',Auth::user()->id)
        ->orderByDesc('id')
        ->get();
    }

    public function remove($id)
    {
        $result = Customer::where('id',$id);
        if($result){
            return Customer::where('id',$id)->delete();
        }
        return false;
    }

}