<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];
    // Relationship: A post belongs to an author (user)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Scope: Filter only published posts.
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }
    /**
     * Scope: Filter posts with images.
     */
    public function scopeWithImage($query)
    {
        return $query->whereNotNull('image');
    }
    /**
     * Scope: Sort by promoted and published_at.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('promoted', 'desc')->orderBy('published_at', 'desc');
    }
}
