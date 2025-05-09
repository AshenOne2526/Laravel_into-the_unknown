<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;
    protected $table = 'posts';

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
}
