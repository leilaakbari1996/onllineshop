<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {//only users logined
        $this->middleware('auth');
    }
    public function index(){
        return view('client.likes.index',[
            'likes' => auth()->user()->likes()->get()
        ]);
    }
    public function store(Request $request,Product $product){
        auth()->user()->like($product);
        return response(['likes_count' => auth()->user()->likes()->count() ],200);
    }
    public function destroy(Product $product){
        auth()->user()->deleteLike($product);
        return back();
    }


}
