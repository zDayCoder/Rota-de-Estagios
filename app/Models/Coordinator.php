<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    use HasFactory;
    protected $table = 'coordinators';
    protected $fillable = [
        'coordinator_registration',
        'contact',
        'user_id'
    ];
}
