<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';
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
        'id_farms', //autenticação pelo id da fazenda
    ];

    public function cio()
    {
        return $this->hasMany('App\Models\Cio');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Farm');
    }
}
