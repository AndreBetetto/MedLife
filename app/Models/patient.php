<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'nome',
        'cpf',
        'rg',
        'data_nasc',
        'endereco',
        'telefone',
        'plano_saude',
        'sexo',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
