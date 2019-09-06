<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $filable = [
        'nome',
        'birth',
        'gender',
        'classification',
        'breed',
        'son',
        'mother',
        'father',
        'status',
        'profile',
        'age'
    ];

    /*
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    */
}
