<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipmentrental extends Model
{
    use HasFactory;

    protected $table = 'equipmentrentals';

    protected $fillable = [
        'name',
        'price',
        'description',
        'photo',
        'category',
        'subcategory',
        'slug',
        'stock_quantity',
        'availability_status',
    ];

    protected function casts(): array
    {
        return ['price' => 'decimal:2', 'stock_quantity' => 'integer'];
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlistedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function isAvailable(): bool
    {
        return $this->availability_status === 'available' && $this->stock_quantity > 0;
    }
}
