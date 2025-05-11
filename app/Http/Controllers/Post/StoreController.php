<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){
        $validated = $request->validated();

        $this->service->store($validated);
        
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }
}
