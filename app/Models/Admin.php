<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
