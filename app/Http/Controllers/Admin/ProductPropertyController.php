<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function index(Product $product){
        //dd($product->properties->toArray());
       /* $array = $product->properties;
        dd($array[0]->pivot->value);*/
        return view('admin.productProperty.index',[
            'product' => $product
        ]);
    }
    public function create(Product $product){
        return view("admin.productProperty.create",[
            'product' => $product
        ]);
    }
    public function store(Request $request,Product $product){
        $properties = collect($request->get('properties'))->filter(function($item){
            if(!empty($item['value'])){
                return $item;
            }
        });
        $product->properties()->sync($properties);
        session()->flash('success',' ویژگی محصول مورد نظر شما با موفقیت اضاف شد.');
        return redirect()->back();
    }
}
