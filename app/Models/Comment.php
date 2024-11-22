<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'body'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }   

    public function scopeFirstFirst($query)
    {
        return $query->orderBy('created_at', 'asc');
    }   

}
