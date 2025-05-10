<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post){
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|numeric|min:0',
            'tags' => 'array', // validate that it's an array
            'tags.*' => 'integer|exists:tags,id', // each tag must be a valid tag id
        ]);

        $post->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        if (isset($validated['tags'])) {
            $post->tag()->sync($validated['tags']);
        }
        
        return redirect()->route('post.show', $post->id)->with('success', 'Post updated successfully!');
    }
}
