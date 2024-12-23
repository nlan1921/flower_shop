<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->product_id = $request->product_id;
        $comment->content = $request->content;
        $comment->save();

        return back()->with('success', 'Bình luận của bạn đã được gửi thành công.');
    }
}
