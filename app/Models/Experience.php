<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'employer',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'curriculum_id',
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}