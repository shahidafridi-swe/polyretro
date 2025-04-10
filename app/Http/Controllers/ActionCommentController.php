<?php

namespace App\Http\Controllers;

use App\Models\ActionComment;
use Illuminate\Http\Request;

class ActionCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'action_id' => 'required',
            'author_id' => 'required'
        ]);
        $comment = ActionComment::create([
            'body' => $request->body,
            'action_id' => $request->action_id,
            'author_id' => $request->author_id,
        ]);
        return response()->json($comment);

    }
}
