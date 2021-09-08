<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request,Product $product){
        Comment::query()->create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'content' => $request->get('content')
        ]);
        return redirect()->back();
    }
}
