<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'forms_id',
        'nivelDor',
        'nivelFebre',
        'sintomas',
        'sangramento',
        'observacoes',
        'numDia',
        'status',
        'medicamentos',
        'prioridadeMedico',
        'grupo',
        'tipo',
        'alergias',
        'diagnostico'
        
    ];
}
