<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;


class PostsController extends Controller implements HasMiddleware

{

    public static function middleware() {
        return [
            new Middleware('verifyUserForEditAndDelete',only: ['edit','update','destroy','publish','forceDelete','restore']),
        ];
    }
    public function index() {
        if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin()) {
            $posts = Post::latest('updated_at')->paginate(10);
        } else {
            $posts = Post::where('user_id',auth()->id())
                                    ->latest('updated_at')
                                    ->paginate(10);
        }

        return view('admin-panel.posts.index',compact(['posts']));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin-panel.posts.create',compact(['categories','tags']));
    }

    public function store(CreatePostRequest $request) {
        $image = $request->file('image')->store('images/posts');
        $post = Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category_id,
            'image_path'=>$image,
            'user_id'=> 1
        ]);
        // dd($post->tags());
        $post->tags()->attach($request->tags);

        return redirect(route('posts.index'))->with('success','Post Created successfully!');
    }

    public function edit(Request $request, Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin-panel.posts.edit',compact(['post','categories','tags']));
    }

    public function update(UpdatePostRequest $request,Post $post) {
        $data = $request->only(['title','excerpt','body','published_at','category_id']);

        if($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images/posts');
            $post->deleteImage();
        }
        $post->update($data);
        $post->tags()->sync($request->tags);

        session()->flash('success','Post updated successfully!');
        return(redirect(route('posts.index')));
    }

    public function publish (Request $request,Post $post) {
        $post->published_at = now();
        $post->save();
        session()->flash('success','Post published successfully!');
        return (redirect(route('posts.index')));
    }

    public function destroy (Post $post) {
        // $post->deleteImage();
        $post->delete();
        session()->flash('success','Post updated successfully!');
        return (redirect(route('posts.index')));
    }

    public function trashed() {
        if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin()  ) {
            $posts = Post::onlyTrashed()->paginate(10);
        } else {
            $posts = Post::onlyTrashed()->where('user_id',auth()->id())->paginate(10);
        }
        return view('admin-panel.posts.trashed',compact(['posts']));

    }
    public function restore(int $postId) {
        // dd($postId);
        $post = Post::onlyTrashed()->find($postId);
        $post->restore();
        session()->flash('success','Post restored successfully!');
        return (redirect(route('posts.trashed')));
    }
    public function forceDelete (int $postId) {
        $post = Post::onlyTrashed()->find($postId);

        $post->deleteImage();
        $post->forceDelete();
        session()->flash('success','Post updated successfully!');
        return (redirect(route('posts.trashed')));
    }
}
