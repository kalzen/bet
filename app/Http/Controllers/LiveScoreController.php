<?php

namespace App\Http\Controllers;

class LiveScoreController extends Controller
{
    public function index()
    {
        return view('livescore.livescore');
    }
}