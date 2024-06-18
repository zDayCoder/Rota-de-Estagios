<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    protected $table = 'interns';
    protected $fillable = [
        'birth_date',
        'gender',
        'cpf',
        'phone',
        'educational_institution',
        'current_course',
        'current_period',
        'user_id',
        'work_contract',
        'internship_approval'
    ];

}
