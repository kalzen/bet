<?php

namespace App\Http\Controllers;

use App\Models\Booker;
use App\Models\BookerCategory;
use App\Models\Lang;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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

    public function filter($slug)
    {
        // get current lang 
        $current_lang_id = Lang::where('locale', app()->getLocale())->first()->id;
        $booker_category = BookerCategory::where('slug', $slug)->first();
        $main_category = null;
        try {
            $main_category = $booker_category->langParent()->first();
        } catch (\Exception $e) {
            $main_category = null;
        }
        // dd($current_lang_id);


        if($main_category) {
            $bookers = Booker::whereHas('categories', function($query) use ($main_category) {
                $query->whereIn('slug', [$main_category->slug]);
            })->get();
        }
        $hot_bookers = collect([]);
        $categories = BookerCategory::orderBy('name', 'asc')->get();
        try {
            $currentCategoryName = $main_category->getAvailableLang()->name;
        } catch (\Throwable $th) {
            $currentCategoryName = $main_category->name;
        }
        return view('booker.index', compact('bookers', 'hot_bookers', 'categories', 'currentCategoryName'));
    }



    public function detail($alias)
    {
        $booker = Booker::where('id',$alias)->firstOrFail();
        return view('booker.detail',compact('booker'));
    }
}
