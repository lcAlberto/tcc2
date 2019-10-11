<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cio extends Model
{
    protected $fillable = [
        'id_animals',
        'dt_cio',
        'dt_cobertura',
        'dt_parto_previsto',
        'dt_parto',
        'tipo',
        'pai',
        'filho',
        'status',
        'created_by',
        'id_farms',
    ];

    public function animals()
    {
        return $this->belongsTo('App/Models/Animal');
    }
}
