<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetroController extends Controller
{
    public function show()
    {
        return view('retro.show');
    }
}
