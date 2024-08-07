<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'excerpt', 'published_at', 'user_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
