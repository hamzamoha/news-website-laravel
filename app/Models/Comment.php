<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'website',
        'content',
        'post_id'
    ];
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
