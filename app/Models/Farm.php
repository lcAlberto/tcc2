<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Farm extends Model
{
    protected $fillable = ['id_users', 'name', 'cep', 'city', 'state'];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
