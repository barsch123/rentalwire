<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Tag extends Model
{
    use HasFactory;

    public function blogs()
    {
        return $this->belongsToMany(Blogs::class, 'blog_tag', 'tag_id', 'blog_id');
    }
}
