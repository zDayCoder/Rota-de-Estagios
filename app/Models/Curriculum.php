<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'address',
        'cep',
        'email',
        'phone_number',
        'professional_objective',
        'academic_course',
        'institution',
        'start_year',
        'expected_completion_year',
        'skills',
        'languages',
        'projects',
        'certifications',
        'extracurricular_activities',
    ];
}
