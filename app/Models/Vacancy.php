<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $table = 'vacancy';
    protected $fillable = ['vaga_id', 'company_id', 'name', 'description', 'salary', 'model', 'addreess_id',];
}
