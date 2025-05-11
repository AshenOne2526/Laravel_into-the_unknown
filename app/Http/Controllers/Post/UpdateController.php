<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post){
        $validated = $request->validated();

        $this->service->update($post, $validated);
        
        return redirect()->route('post.show', $post->id)->with('success', 'Post updated successfully!');
    }
}
