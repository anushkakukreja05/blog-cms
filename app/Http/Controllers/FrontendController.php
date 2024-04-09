<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class FrontendController extends Controller
{
    public function index() {
        $categories = Category::limit(5)->get();
        $tags = Tag::limit(7)->get();
        $posts = Post::whereNotNull('published_at')
                        ->latest()
                        ->simplePaginate(9);

        return view('welcome',compact(['categories','tags','posts']));
    }
}