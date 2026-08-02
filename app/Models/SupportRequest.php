<?php

namespace App\Models;

use Database\Factories\SupportRequestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportRequest extends Model
{
    /** @use HasFactory<SupportRequestFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'subject', 'message', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
