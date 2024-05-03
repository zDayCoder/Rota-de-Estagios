<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'zip_code',
        'street_address',
        'complement',
        'neighborhood',
        'city',
        'state',
        'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }
}
