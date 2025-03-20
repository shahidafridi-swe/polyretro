<?php

namespace App\Http\Controllers;

use App\Mail\TeamConfirmationMail;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;
class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
//        dd('hello');
//        dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => [File::types(['png', 'jpg', 'jpeg'])],

        ]);
        $emails = $request->input('members');
        $emails = explode (",", $emails);
//        dd($emails);
//        dd($validated);
        $owner_id = Auth::user()->id;
        $team = Team::create([
            'name' => $validated['name'],
            'logo' => $request->file('logo') ? $request->file('logo')->store('logos') : null,
            'color' => sprintf("#%06X", mt_rand(0, 0xFFFFFF)),
            'owner_id'=> $owner_id,
        ]);
//        $team->members()->attach($owner_id);
        TeamMember::create([
            'team_id' => $team->id,
            'user_id' => $owner_id,
        ]);

        foreach ($emails as $email) {
            $user = User::where('email', $email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => Str::before($email, '@'),
                    'email' => $email,
                    'password' => Hash::make(Str::random(12)),
                    'color' => sprintf("#%06X", mt_rand(0, 0xFFFFFF)),
                ]);


            }

            TeamMember::create([
                'team_id' => $team->id,
                'user_id' => $user->id,
            ]);
            Mail::to($user->email)->send(new TeamConfirmationMail([
                'name' => $user->name,
                'team_name' => $team->name,
            ]));
        }

        return redirect('/');

    }


    public function show()
    {
        return view('teams.show');
    }

    public function searchUsers(Request $request)
    {
        $search = $request->input('query');

        $users = User::where('email', 'LIKE', "%{$search}%")
            ->select('id', 'name', 'email')
            ->get();

        return response()->json($users);
    }
}
