<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $layout = 'layouts.app';

    /**
     * Show the application dashboard.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts', compact('posts'));
    }
}
