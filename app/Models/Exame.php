<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'descricaoexame',
        'grupo',
        'dataExame',
        'convenio',
        'duracaopadrao',
        'observacao'
    ];
}
