<?php

namespace App\Http\Services\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class Service extends Controller
{
    public function store($validated){
        $post = Post::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        if (isset($validated['tags'])) {
            $post->tags()->attach($validated['tags']);
        }
    }

    public function update($post, $validated){
        $post->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }
    }

    public function destroy($post){
        $post->delete();
    }
}
