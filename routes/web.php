<?php

use App\Http\Controllers\ActionCommentController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\TeamController;
use App\Models\ActionUser;
use App\Models\Retro;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    $teams = Auth::user()->teams()->get();

    $retros = Retro::whereIn('team_id', $teams->pluck('id'))
        ->where('status', 'in progress')
        ->get();

    $actions = ActionUser::where('user_id', Auth::id())
        ->with([
            'action.assignedUsers:id,name,email,color,photo', // Corrected eager loading
            'action:id,body,priority,status,deadline'
        ])
        ->get();


    return view('dashboard', [
        'teams' => $teams,
        'retros' => $retros,
        'actions' => $actions
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('/search-users', [TeamController::class, 'searchUsers'])->name('search.users');

    Route::get('/retros/{retro}', [RetroController::class, 'show'])->name('retro.show');
    Route::post('/retros', [RetroController::class, 'store'])->name('retro.store');
    Route::put('/retros/{retro}', [RetroController::class, 'update'])->name('retro.update');

    Route::get('/mad-posts/{retro}', [PostController::class, 'getMadPosts'])->name('posts.mad.all');
    Route::get('/sad-posts/{retro}', [PostController::class, 'getSadPosts'])->name('posts.sad.all');
    Route::get('/glad-posts/{retro}', [PostController::class, 'getGladPosts'])->name('posts.glad.all');
    Route::post('/posts', [PostController::class, 'storePost'])->name('posts.store');
    Route::put('/posts/{post}', [PostController::class, 'updatePost'])->name('posts.update');

    Route::get('/actions/{retro}', [ActionController::class, 'getActions'])->name('actions');
    Route::post('/actions', [ActionController::class, 'storeActions'])->name('actions.store');
    Route::put('/actions/{action}', [ActionController::class, 'updateActions'])->name('actions.update');
    Route::post('/actions/assign-members', [ActionController::class, 'assignMembers'])->name('actions.assign.members');


    Route::post('/reacts', [ReactController::class, 'store'])->name('react.store');
    Route::get('/reacts/{post}/{user}', [ReactController::class, 'getReact'])->name('get.react');
    Route::delete('/reacts/{post}/{user}', [ReactController::class, 'destroy'])->name('destroy.react');


    Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/action-comments', [ActionCommentController::class, 'store'])->name('action.comment.store');


});


//Route::get('/teams/create', function () {
//    return view('welcome');
//});


require __DIR__.'/auth.php';
