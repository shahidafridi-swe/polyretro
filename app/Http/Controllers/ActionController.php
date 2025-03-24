<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Post;
use App\Models\Retro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    public function getActions($retroId)
    {
        $actions = Action::where('retro_id', $retroId)->latest()->get();
        return response()->json($actions);
    }
    public function storeActions(Request $request)
    {
//        dd('hello');
        $request->validate([
            'body' => 'required|string',
            'retro_id' => 'required|exists:retros,id',
        ]);

        $action = Action::create([
            'body' => $request->body,
            'retro_id' => $request->retro_id,
        ]);

        return response()->json($action);
    }
}
