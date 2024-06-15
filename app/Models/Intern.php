<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    // Definindo o nome da tabela
    protected $table = 'interns';

    // Permitir que essas colunas sejam preenchíveis em massa
    protected $fillable = [
        'birth_date',
        'gender',
        'cpf',
        'phone',
        'educational_institution',
        'current_course',
        'current_period',
        'address_id',
    ];

    // Definindo o relacionamento com a tabela addresses
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
