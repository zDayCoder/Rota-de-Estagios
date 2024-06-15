<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancySkill extends Model
{
    use HasFactory;

    protected $table = 'vacancySkill';

    protected $fillable = [
        'name',
        'level',
        'vacancy_id',
    ];

    
}
