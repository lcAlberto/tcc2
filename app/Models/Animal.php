<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'nome', //name
        'dt_nascimento',//birth
        'sexo',//gender
        'classificacao',//classificação
        'raca',//breed
        'filho',// son
        'mae',//mae
        'pai',//pai
        'status',//status
        'profile',//imagem de perfil
        'idade',//idade
        'created_by', //criado_por
    ];

    public function cio()
    {
        return $this->hasMany('App\Models\Cio');
    }
}
