<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Posts = Post::all();
        
        return view('posts', compact('Posts'));
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
        $PostsArr = [
            [
                'name' => 'Post1',
                'price' => 1000,
                'is_published' => 1
            ],
            [
                'name' => 'Post2',
                'price' => 2000
            ]
        ];

        foreach ($PostsArr as $item){
            Post::create($item);
        }

        dd('created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $Post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $Post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(UpdatePostRequest $request, Post $Post)
    {
        dd($Post);
    }*/

    public function update()
    {
        $Post = Post::find(1);
        dump($Post->name);

        $Post->update([
            'name' => 'new Post2'
        ]);

        $Post = Post::find(1);
        dump($Post->name);
    }

    public function delete(){
        $Post = Post::find(1);
        if($Post){
            $Post->delete();
            dd('deleted');
        }else{
            dd('nothing to delete');
        }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $Post)
    {
        //
    }
}
