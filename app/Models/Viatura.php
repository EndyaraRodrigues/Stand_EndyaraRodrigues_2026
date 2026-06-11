<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    //
    protected $fillable = ['marca', 'modelo', 'matricula', 'ano', 'quilometros', 'preco', 'foto', 'estado'];

public function venda() {
    return $this->hasOne(Venda::class);
}
}
