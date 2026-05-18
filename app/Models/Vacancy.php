<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'company_id',
        'date_posted',
        'title',
        'description',
        'number_of_positions',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
