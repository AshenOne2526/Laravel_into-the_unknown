<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$post = Post::find(1);
        dd($post->tags);*/

        $tag = Tag::find(1);
        dd($tag->posts);

        //$Posts = Post::all();
        //return view('post.index', compact('Posts'));
    }

    /**
     * Show Post from db by ID
     */
    public function getPost($id){
        $Post = Post::FindOrFail($id);
        dd($Post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Post::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
        ]);
        
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(UpdatePostRequest $request, Post $Post)
    {
        dd($Post);
    }*/

    public function update(Post $post)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $post->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
        ]);
        
        return redirect()->route('post.show', $post->id)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }

    public function restore(){
        $Post = Post::withTrashed()->find(1);
        if($Post){
            $Post->restore();
            dd('restored');
        }else{
            dd('nothing to restore');
        }
    }

    public function firstOrCreate(){
        $newPost = [
            'name' => 'Post1_first_or_create',
            'price' => 2000,
            'is_published' => 1
        ];

        $Post = Post::firstOrCreate($newPost);

        dd($Post->name);
    }

    public function updateOrCreate(){
        $newPost = [
            'name' => 'Post2_update_or_create',
            'price' => 2000,
            'is_published' => 1
        ];
        $Post = Post::updateOrCreate(['name' => $newPost['name']],$newPost);

        dd($Post);
    }
}
