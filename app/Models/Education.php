<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'curriculum_id',
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}