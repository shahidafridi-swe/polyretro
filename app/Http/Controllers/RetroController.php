<?php

namespace App\Http\Controllers;

use App\Models\Retro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetroController extends Controller
{
    public function show(Retro $retro)
    {
        $team = $retro->team;
        $members = $team->members()->with('user')->get();
        return view('retro.show', compact('retro', 'team', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
        ]);
        $retro = Retro::create([
            'team_id' => $validated['team_id'],
            'name' => $validated['name'],
        ]);
        return redirect()->route('teams.show', $validated['team_id']);
    }

    public function update(Request $request, $retroId)
    {
        $retro = Retro::find($retroId);
        $retro->status = $request->status;
        $retro->save();
    }


}
