<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post){
        $validated = $request->validated();

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
