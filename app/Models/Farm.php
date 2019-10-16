<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Farm extends Model
{
    protected $fillable = ['name', 'cep', 'city', 'state'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

//    public function animals()
//    {
//        return $this->belongsTo('App\Models\Farm');
//    }
}
