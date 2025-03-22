<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    $teams = Auth::user()->teams()->get();

    return view('dashboard', ['teams' => $teams]);
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
});


//Route::get('/teams/create', function () {
//    return view('welcome');
//});


require __DIR__.'/auth.php';
