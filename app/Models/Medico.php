<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'data_nasc',
        'telefone',
        'crm',
        'especialidade',
        'sexo',
        'id_medico',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'id_medico');
    }
}
