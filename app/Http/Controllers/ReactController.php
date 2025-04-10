<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\PostReaction;
use Illuminate\Http\Request;

class ReactController extends Controller
{
    public function store(Request $request)
    {
//        $request->validate([
//            'type' => 'required',
//            'post_id' => 'required',
//            'user_id' => 'required'
//        ]);

        $react = PostReaction::create([
            'type' => $request->type,
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ]);
        return response()->json($react);
    }

    public function getReact($postId, $userId){
        $react = PostReaction::where('post_id', $postId)->where('user_id', $userId)->first();
        return response()->json($react);
    }

    public function destroy($postId, $userId){
        $react = PostReaction::where('post_id', $postId)->where('user_id', $userId)->first();
        if ($react) {
            $react->delete();
            return response()->json(['message' => 'Reaction deleted successfully.']);
        } else {
            return response()->json(['message' => 'Reaction not found.']);
        }
    }


}
