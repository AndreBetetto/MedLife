<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formDiario extends Model
{
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'paciente_id',
        'numDias',
        'observacoes',
        'medicamentos',
        'diagnostico',
        'status',
        'new'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);

    }
}
 