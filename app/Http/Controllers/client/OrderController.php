<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

// At the top of the file.
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderController extends Controller
{
    public function __construct()
    {//only users logined
        $this->middleware('auth');
    }
    public function create(){
        return view('client.orders.create');
    }
    public function store(OrderRequest $request){
        $order = Order::query()->create([
            'amount' => Cart::totalAmount(),
            'address' => $request->get('address'),
            'user_id'=>auth()->id()
        ]);
        foreach(Cart::itemCart() as $item){
            $product = $item['product'];
            $order->details()->create([
                'product_id' => $product->id,
                'unit_amount' => $product->cost_with_discount,
                'quantity' => $item['quantity']

            ]);
        }
        Cart::removeAll();

        $invoice = (new Invoice)->amount($order->amount);

        return Payment::purchase($invoice, function($driver, $transactionId) use ($order){
            $order->update([
                'transaction_id' => $transactionId
            ]);
        })->pay()->render();


        return redirect()->back();

    }
    public function callback(Request $request){
        $order = Order::query()->where('transaction_id',$request->get('Authority'))->first();
        $status = 0;
        if($request->get('Status') == 'OK'){
            $status = 1;
        }
        $order->update([
            'status' => $status
        ]);
        return redirect(route('client.order.show',$order));
    }
    public function show(Order $order){
        return view('client.orders.show',[
            'order' => $order
        ]);
    }
}
