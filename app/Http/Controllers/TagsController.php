<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $tags = Tag::latest()->paginate(5);
        // dd($tags);
        return view('admin-panel.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {
        // dd($request->all);
        Tag::create($request->all());
        return redirect(route('tags.index'))->with('success','Tag Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin-panel.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {   $tag->name = $request->name;

        if($tag->isClean()){
             return redirect(route('tags.index'))->with('error','No changes made');
        }
        $tag->save();
        // Tag::update($request->except(['id']));
        return redirect(route('tags.index'))->with('success','Tag Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if($tag->posts()->limit(1)->first()) {
            return redirect(route('tags.index'))
            ->with('error','Tag cannot be Deleted , as there exists post on this tag!');
        }
        $tag->delete();
        return redirect(route('tags.index'))->with('success','Tag Deleted Successfully');
    }
}
