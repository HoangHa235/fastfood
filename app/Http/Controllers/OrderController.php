<?php

namespace App\Http\Controllers;

use App\Http\Service\CartService;
use Illuminate\Http\Request;
use App\Http\Service\Order\OrderService;
use App\Models\Customer;

class OrderController extends Controller
{
    protected $orderService;
    protected $cart;

    public function __construct(OrderService $orderService,CartService $cart)
    {
        $this->orderService = $orderService;
        $this->cart = $cart;
    }
    public function index()
    {
        $result = $this->orderService->get();
        return view('order.order',[
            'title' => 'Đơn hàng',
            'orders' =>$result,
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);
        return view('order.detail',[
            'title' => 'Chi tiết đơn hàng '.$customer->id,
            'customer' => $customer,
            'carts' => $carts           
        ]);
    }

    public function remove($id)
    {
        $result = $this->orderService->remove($id);
        if($result){
            return redirect()->route('home.index');
        }
    }
}
