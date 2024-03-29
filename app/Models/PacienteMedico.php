<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id'
    ];
}
