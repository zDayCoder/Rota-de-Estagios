<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='company';
    protected $fillable = [
        'id', 'company_name', 'fancy_name', 'cnpj', 'email', 'contact',
        'municipal_registration', 'state_registration', 'legal_nature',
        'branch', 'user_id','address_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
