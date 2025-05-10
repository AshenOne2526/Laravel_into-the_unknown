<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
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
