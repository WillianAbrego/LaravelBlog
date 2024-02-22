<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware();
    // }

    public function index()
    {


        return view('pages.blog.index');
    }
}
