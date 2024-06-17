<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'vacancy_id', 'application_date',
        'intern_id', 'company_id', 'intern_name',
    ];
}
