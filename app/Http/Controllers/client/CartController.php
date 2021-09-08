<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('client.cart.index',[
            'totalAmount' => Cart::totalAmount(),
            'itemsCart' => Cart::getItems(),
            'totalAmountwithOutDiscount' => Cart::totalAmountwithOutDiscount(),
            'totalDiscount' => Cart::totalDiscount()

        ]);
    }
    public function store(Request $request,Product $product){
        Cart::new($product,$request->get('quantity'));
        return response([
            'msg'=>'successful',
            'cart' => Cart::getItems()


        ],200);
    }
    public function destroy(Product $product){
        Cart::remove($product);
        return response([
            'msg' => 'successful',
            'cart' => Cart::getItems()
        ],200);
    }
    public function update(Request $request,Product $product){
         Cart::update($request->get('quantity'),$product);
         return response([
             'msg'=>'update',
             'cart'=>Cart::getItems()
         ]);
    }
}
