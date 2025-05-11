<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post){
        $post->load('tag');
        return view('post.show', compact('post'));
    }
}
