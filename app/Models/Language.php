<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'curriculum_id',
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}