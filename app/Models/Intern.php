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
        'address_id',
        'curriculum_id',
        'work_contract',
        'internship_approval'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
