<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancySkill extends Model
{
    use HasFactory;

    protected $table = 'VacancySkill';

    protected $fillable = [
        'name',
        'level',
        'vacancy_id',
    ];

    
}
