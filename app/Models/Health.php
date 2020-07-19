<?php

namespace App\Models;

use App\Models\Animal;
use App\Models\Farm;
use App\Models\Medicament;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    //

    protected $fillable = [
        'symptom',
        'date_symptom',
        'disease',
        'causer_agent',
        'start_of_treatment',
        'end_of_treatment',
        'treatment_type',

        'farm_id',
        'user_id',
        'animal_id',
        'medicament_id'
    ];


    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function animal()
    {
        return $this->belongsToMany(Animal::class);
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }
}
