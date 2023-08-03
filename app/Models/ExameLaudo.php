<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExameLaudo extends Model
{
    use HasFactory;

    protected $fillable = [
        'exame_id',
        'paciente_id',
        'dataLaudo',
        'nomearquivo',
        'random'
    ];
}


