<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
     protected $fillable = [
        'name',
        'email',
        'website',
        'phone',
        'address',
        'industry',
        'size',
        'description',
        'logo',
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
