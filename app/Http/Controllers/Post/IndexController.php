<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(){
        $Posts = Post::all();
        return view('post.index', compact('Posts'));
    }
}
