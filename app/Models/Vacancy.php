<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'company_id', 'name', 'description', 'salary','skills_id','model','status', 'trainee_id', 'address_id',];

    protected $table = 'vacancy';

    protected $attributes = [
        'address_id' => 1,
        'skills_id' => 1,
        'trainee_id' => 1,
    ];

    

    public function relacSkills()
    {
        return $this->hasOne('App\Models\VacancySkill', 'id', 'skills_id');
    }

    public function relacAddress()
    {
        return $this->hasOne('App\Models\Address', 'id', 'address_id');
    }
}
