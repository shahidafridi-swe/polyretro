<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'post_id' => 'required',
            'author_id' => 'required'
        ]);
        $comment = Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'author_id' => $request->author_id,
        ]);
        return response()->json($comment);
    }
}
