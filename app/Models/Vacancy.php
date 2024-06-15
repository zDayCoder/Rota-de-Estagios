<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $table = 'vacancy';
    protected $fillable = ['vaga_id', 'company_id', 'name', 'description', 'salary','skills_id','model', 'address_id',];

    protected $attributes = [
        'address_id' => 1,
        'skills_id' => 1,
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
