<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'summary', 'city', 'state', 'intern_id'];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }
}
