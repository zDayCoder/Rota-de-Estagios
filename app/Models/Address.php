<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'zip_code', 'street_address', 'complement',
        'neighborhood', 'city', 'state', 'number','user_id'
    ];

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
