<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo', 'cpf', 'email', 'telefone',
        'logradouro', 'numero', 'complemento', 'cep',
        'bairro', 'cidade', 'estado', 'codigo_ibge',
        'foto_usuario'
    ];
}
