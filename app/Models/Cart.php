<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Environment\Console;

class Cart
{


    public static function new(Product $product,$quantity){
        if(self::hasSession('cart')){//aya sabad kharid vojod dard?
            $cart = self::itemCart();//sabad kharid ra begir.
        }

        $cart[$product->id] = [//be index array cart in array ra add kon.
            'product' => $product,
            'quantity' => $quantity
        ];
        session()->put([
            'cart' => $cart
        ]);
        $cart['tatalAmount'] = self::totalAmount();
        $cart['tatal_item'] = self::totalItems();
        $cart['totalDiscount'] = self::totalDiscount();
        $cart['total'] = self::totalAmountwithOutDiscount();


    }
    public static function hasSession($strsession){
        if(session()->has($strsession)){
            return true;
        }
        return false;
    }
    public static function totalDiscount(){
        return self::totalAmountwithOutDiscount() - self::totalAmount();
    }
    public static function totalAmountwithOutDiscount(){
        $total = 0;
        if(self::hasSession('cart')){
             foreach(self::getItems() as $item){
                 if(is_array($item)){
                     $total += $item['product']->price * $item['quantity'];
                 }
             }
        }
        return $total;
    }
    public static function totalAmount(){
       $total =0;
       if(self::hasSession('cart')){
        foreach(self::getItems() as $cartItem){
            if(is_array($cartItem) && array_key_exists('product',$cartItem) && array_key_exists('quantity',$cartItem)){
                $total += $cartItem['product']->cost_with_discount * $cartItem['quantity'];
            }
        }
        return $total;
      }
      return 0;

    }
    public static function itemCart(){
        $items = collect(self::getItems())->filter(function($item){
            if(is_array($item)){
                return $item;
            }
        });
        return $items;
    }
    public static function totalItems(){
        $items = self::itemCart();
        return count($items);
    }
    public static function getItems(){
        if(self::hasSession('cart')){
            return session()->get('cart');
        }
        return null;
    }
    public static function remove(Product $product){
        if(self::hasSession('cart')){
            $cart = self::itemCart();
            $cart->forget($product->id);
            session()->put([
                'cart' => $cart
            ]);
            $cart['tatalAmount'] = self::totalAmount();
            $cart['tatal_item'] = self::totalItems();
            $cart['totalDiscount'] = self::totalDiscount();
            $cart['total'] = self::totalAmountwithOutDiscount();
        }

    }
    public static function update($quantity,Product $product){
        if(self::hasSession('cart')){
            $cart = self::itemCart();
            $cart[$product->id] = [//be index array cart in array ra add kon.
                'product' => $product,
                'quantity' => $quantity
            ];
            session()->put([
                'cart' => $cart
            ]);
            $cart['tatalAmount'] = self::totalAmount();
            $cart['tatal_item'] = self::totalItems();
            $cart['totalDiscount'] = self::totalDiscount();
            $cart['total'] = self::totalAmountwithOutDiscount();
        }
    }
    public static function removeAll(){
        session()->forget('cart');
    }
}
