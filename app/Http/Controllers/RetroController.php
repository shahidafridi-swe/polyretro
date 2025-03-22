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
        return view('retro.show', compact('retro', 'team'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id', // Ensures valid team_id
        ]);

        $retro = Retro::create([

            'team_id' => $validated['team_id'], // Use the team_id from the form
            'name' => $validated['name'],
        ]);

//        dd($retro);

        return redirect()->route('teams.show', $validated['team_id']); // Redirect to the team page
    }


}
