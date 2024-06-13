<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table='company';

    protected $fillable = [
        'company_name',
        'fancy_name',
        'cnpj',
        'email',
        'contact',
        'municipal_registration',
        'state_registration',
        'legal_nature',
        'branch',
        'address_id',
    ];

    public function relacAddress()
    {
        return $this->hasOne('App\Models\Address', 'id', 'address_id');
    }

}
