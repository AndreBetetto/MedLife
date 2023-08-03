<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobrenome',
        'user_id',
        'dataNasc',
        'sexo',
        'cpf',
        'rg',
        'fone',
        'estadoCivil',
        'especialidade',
        'crm'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
