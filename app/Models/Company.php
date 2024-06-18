<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $fillable = [
        'company_name', 'fancy_name', 'cnpj', 'email', 'contact',
        'municipal_registration', 'state_registration', 'legal_nature',
        'branch', 'user_id'
    ];

    
}
