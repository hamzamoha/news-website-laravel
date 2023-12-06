<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'status',
        'content',
        'categories',
        'tags',
        'image',
        'video',
        'user_id'
    ];
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
