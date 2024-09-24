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
        // $catalogues = Catalogue::orderBy('id','asc')->take(5)->get();
        // $testimonials = Testimonial::All();
        $bookers = Booker::where('is_hot', 0)->orderBy('ordering', 'desc')->get();
        $hot_bookers = Booker::where('is_hot', 1)->orderBy('ordering', 'desc')->get();
        $categories = BookerCategory::orderBy('name', 'asc')->get();
        // $codes = Code::orderBy('id', 'desc')->take(4)->get();
        // $teams = Team::All();
        // $posts = Post::latest()->withCount(['images'])->having('images_count','>',0)->active()->take(6)->get();
        // $tips = Tip::all();
        // $post = new Post();
        return view('booker.index',compact('bookers','hot_bookers'));
    }
}
