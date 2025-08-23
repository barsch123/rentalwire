<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'published_at', 'modified_at', 'blog_photo'];

    protected $casts = [
        'published_at' => 'date',
        'modified_at' => 'datetime:Y-m-d H:i:s',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
    }
    // Custom accessor for 'published_at'
    // public function getPublishedAtFormattedAttribute()
    // {
    //     return Carbon::parse($this->published_at)->format('M d, Y'); // Feb 8, 2025
    // }

    // // Custom accessor for 'modified_at'
    // public function getModifiedAtFormattedAttribute()
    // {
    //     return Carbon::parse($this->modified_at)->format('M d, Y'); // Feb 8, 2025
    // }
}