<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function blogs()
    {
        return $this->belongsToMany(Blogs::class, 'blog_tag', 'tag_id', 'blog_id');
    }
}
