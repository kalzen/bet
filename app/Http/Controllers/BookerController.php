<?php

namespace App\Http\Controllers;

use App\Models\Booker;
use App\Models\BookerCategory;
use App\Models\Post;
use Illuminate\Http\Request;

class BookerController extends Controller
{

    public function index()
    {
        $locale = app()->getLocale();
        $bookers = Booker::where('is_hot', 0)
            ->whereNull('lang_parent_id')
            ->orderBy('ordering', 'desc')
            ->get();
        $hot_bookers = Booker::where('is_hot', 1)
            ->whereNull('lang_parent_id')
            ->orderBy('ordering', 'desc')
            ->get();

        $categories = BookerCategory::orderBy('name', 'asc')->get();

        return view('booker.index', compact('bookers', 'hot_bookers', 'categories'));
    }

    public function filter(Request $request)
    {
        $bookers = Booker::where('is_hot', 0)->orderBy('ordering', 'desc');
        $hot_bookers = Booker::where('is_hot', 1)->orderBy('ordering', 'desc');

        if ($request->has('categoryName')) {
            $selectedCategories = $request->input('categoryName');
            
            $bookers = $bookers->whereHas('categories', function($query) use ($selectedCategories) {
                $query->whereIn('name', $selectedCategories);
            });

            $hot_bookers = $hot_bookers->whereHas('categories', function($query) use ($selectedCategories) {
                $query->whereIn('name', $selectedCategories);
            });
        }

        $bookers = $bookers->get();
        $hot_bookers = $hot_bookers->get();

        if ($bookers->isEmpty() && $hot_bookers->isEmpty()) {
            return response()->json([
                'isEmpty' => true,
                'html' => view('booker.partials.empty')->render()
            ]);
        }

        return response()->json([
            'isEmpty' => false,
            'html' => view('booker.partials.booker_list', compact('bookers', 'hot_bookers'))->render()
        ]);
    }



    public function detail($alias)
    {
        $booker = Booker::where('id',$alias)->firstOrFail();
        return view('booker.detail',compact('booker'));
    }
}
