<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $validated = $request->validated();

        $post = Post::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        if (isset($validated['tags'])) {
            $post->tag()->sync($validated['tags']);
        }
        
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }
}
