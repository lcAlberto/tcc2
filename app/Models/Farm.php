<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Farm extends Model
{
    protected $fillable = ['name', 'cep', 'city', 'state', 'id_farms'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
