<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();

        Post::factory()->count(200)->make()->each(function ($post) use ($categories,$tags){
            $post->category_id = $categories->random()->id;
            $post->save();

            $tagIds = $tags->random(rand(1,5))->pluck('id')->toArray();
            $post->tags()->attach($tagIds);
        });
    }
}
