<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'application_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function company()
    {
        return $this->hasOneThrough(Company::class, Vacancy::class, 'id', 'id', 'vacancy_id', 'company_id');
    }

    protected $casts = [
        'application_date' => 'date',
    ];
}