<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\ActionUser;
use App\Models\Post;
use App\Models\Retro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    public function getActions($retroId)
    {
        $actions = Action::where('retro_id', $retroId)
            ->with([
                'comments.author:id,name,email,color,photo',
                'assignedUsers:id,name,email,color,photo',
            ])
            ->latest()
            ->get();

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

    public function updateActions(Request $request,  $actionId)
    {
//        $request->validate([
//            'body' => 'required|string',
//        ]);
        $action = Action::find($actionId);
        if ($request->body){
            $action->body = $request->body;
        }
        if ($request->priority){
            $action->priority = $request->priority;
        }
        if ($request->status){
            $action->status = $request->status;
        }

        $action->save();
        return response()->json(['message' => 'Action updated successfully']);

    }

    public function assignMembers(Request $request)
    {
        $request->validate([
            'action_id' => 'required|integer|exists:actions,id',
            'member_id' => 'required|integer|exists:users,id',
        ]);

        $temp = ActionUser::where('action_id', $request->action_id)
            ->where('user_id', $request->member_id)
            ->first();

        if (!$temp) {
            $data = ActionUser::create([
                'action_id' => $request->action_id,
                'user_id' => $request->member_id,
            ]);
            return response()->json(['message' => 'Assigned member successfully.']);
        } else {
            return response()->json(['message' => 'Member already assigned'], );
        }
    }


}
