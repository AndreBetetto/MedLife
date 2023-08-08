<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobrenome',
        'user_id',
        'dataNasc',
        'cpf',
        'rg',
        'sexo',
        'fone',
        'estadoCivil',
        'profissao',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
