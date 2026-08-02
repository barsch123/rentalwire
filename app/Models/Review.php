<?php

namespace App\Models;

use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /** @use HasFactory<ReviewFactory> */
    use HasFactory;

    protected $fillable = ['equipmentrental_id', 'user_id', 'rating', 'comment'];

    protected function casts(): array
    {
        return ['rating' => 'integer'];
    }

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipmentrental::class, 'equipmentrental_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
