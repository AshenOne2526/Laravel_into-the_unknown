<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke(){
        $Categories = Category::all();
        $Tags = Tag::all();

        return view('post.create', compact('Categories','Tags'));
    }
}
