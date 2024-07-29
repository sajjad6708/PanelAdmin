<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'avatar', 'content', 'parent_id', 'verification', 'post_id'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function parent(): BelongsTo
    {
        return $this?->belongsTo(Comment::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this?->hasMany(Comment::class, 'parent_id');
    }
}
