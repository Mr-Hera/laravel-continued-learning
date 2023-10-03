<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'tagable');
    }

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'tagable');
    }
}
