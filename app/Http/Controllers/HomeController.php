<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     return $this->middleware('auth');
    // }
    public function index()
    {
        $today = new \DateTime();
        return view('home.index', [
            'posts' => Post::where('featured', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', $today)
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }
}
