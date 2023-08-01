<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEndereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
