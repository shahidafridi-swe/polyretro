<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getMadPosts($retroId)
    {
        $madPosts = Post::where('type', 'mad')->where('retro_id', $retroId)->latest()->get();
        return response()->json($madPosts);
    }
    public function getSadPosts($retroId)
    {
        $sadPosts = Post::where('type', 'sad')->where('retro_id', $retroId)->latest()->get();
        return response()->json($sadPosts);
    }
    public function getGladPosts($retroId)
    {
        $gladPosts = Post::where('type', 'glad')->where('retro_id', $retroId)->latest()->get();
        return response()->json($gladPosts);
    }

    public function storePost(Request $request)
    {
//        dd('hello');
        $request->validate([
            'body' => 'required|string',
            'retro_id' => 'required|exists:retros,id',
            'type' => 'required|string'
        ]);

        $post = Post::create([
            'type' => $request->type,
            'body' => $request->body,
            'retro_id' => $request->retro_id,
            'author_id' => Auth::id(),
        ]);

        return response()->json($post);
    }
}
