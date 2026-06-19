<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacoes';

    protected $fillable = [
        'nome', 'telefone', 'email',
        'marca', 'modelo', 'matricula', 'ano', 'quilometros', 'observacoes',
        'data_agendada', 'hora_agendada', 'estado',
    ];
}
