<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cep',
        'tipocep',
        'subtipocep',
        'uf',
        'cidade',
        'bairro',
        'endereco',
        'complemento',
        'codigoibge'
    ];
}
