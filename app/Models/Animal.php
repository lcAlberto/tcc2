<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code',
        'name',
        'born_date',
        'sex',
        'class',
        'breed',
        'status',
        'thumbnail',
        'mother',
        'father',
        'farm_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    /*RELACIONAMENTOS*/

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function AnimalHeat()
    {
        return $this->hasMany(AnimalHeat::class);
    }

    /*SEARCH*/
    public function search(Array $data)
    {
        $animals = $this->where(function ($query) use ($data) {
            if (isset($data['name']))
                $query->where('name', 'like', '%' . $data['name'] . '%');
        });
        return $animals->get();
    }
}
