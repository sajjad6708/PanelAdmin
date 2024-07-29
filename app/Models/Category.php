<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    // use Sluggable;

    protected $fillable = ['title', 'slug', 'parent_id'];

    public function parent(): BelongsTo
    {
        return $this?->belongsTo(Category::class);
    }

    public function children(): HasMany
    {
        return $this?->hasMany(Category::class);
    }

    public function posts(): HasMany
    {
        return $this?->hasMany(Post::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
