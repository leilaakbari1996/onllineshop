<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Product $product){
       return view('admin.productcomments.index',[
           'product' => $product,
            'comments' => $product->comments
       ]);
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->back();
    }
}
