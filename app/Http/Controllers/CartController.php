<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartServive;

    public function __construct(CartService $cartService)
    {
        $this->cartServive = $cartService;
    }

    public function index (Request $request)
    {
        $result = $this->cartServive->create($request);

       if($result == false){
        return redirect()->back();
       }

       return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartServive->getProduct();
        return view('carts.list',[
            'title' => 'Giỏ Hàng',
            'products' =>$products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
        $this->cartServive->update($request);
        
        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartServive->remove($id);

        return redirect('/carts');
    }
    public function removeall()
    {
        $this->cartServive->removeall();
        return redirect()->back();
    }

    public function addCart(Request $request)
    {
        $result = $this->cartServive->addCart($request);

       if($result){
            return view('carts.success',[
            'title' => 'Thanh toán'
            ]);
        }else{
            return redirect()->back();
        }
   }
}