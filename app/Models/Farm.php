<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['id_users', 'name', 'cep', 'city', 'state'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
