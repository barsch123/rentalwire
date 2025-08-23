<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'slug'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
