<?php

namespace App\Http\Controllers\client;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\FeaturedCategory;
use App\Http\Controllers\Controller;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index(){
        return view('client.home',[
            'sliders' => Slider::all(),
            'featuredCategory' => FeaturedCategory::getCategory(),
            'childsCategory' => FeaturedCategory::getCategory()->children,
            'totalAmount' =>Cart::totalAmount()

        ]);
    }

}
