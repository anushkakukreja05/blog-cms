<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{
    public function index() {
        $posts = Post::latest('updated_at')->paginate(10);

        return view('admin-panel.posts.index',compact(['posts']));
    }
}
