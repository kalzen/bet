<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::all();
        // $hot_Tips = Tip::where('is_hot', 1)->orderBy('ordering', 'desc')->get();
        // $categories = TipCategory::orderBy('name', 'asc')->get();

        return view('tip.index', compact('tips'));
    }
}
