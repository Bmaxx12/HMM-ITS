<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'title', 'slug', 'thumbnail', 'excerpt',
    'body', 'category_id', 'author_name',
    'status', 'published_at'
];

protected $casts = [
    'published_at' => 'datetime',
];

public function category()
{
    return $this->belongsTo(Category::class);
}

public function scopePublished($query)
{
    return $query->where('status', 'published')
                 ->whereNotNull('published_at')
                 ->orderByDesc('published_at');
}
}
