<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Newsletter extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'newsletter';

    protected $fillable = [
        'email',
        'status',
        'verification_token',
        'last_email',
    ];

    protected $hidden = [
        'password',
        'email_verified_at',
        'verification_token',
    ];
}
