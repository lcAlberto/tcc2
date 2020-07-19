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


//    public function scopeFarmAnimal($query)
//    {
//        return $query->where('farm_id', '=', auth()->user()->id);
//    }

    /*SEARCH*/
    public function search($data)
    {
        $animals = $this->where(function ($query) use ($data) {
            if (isset($data['search']))
//                $query->where('farm_id', '=', auth()->user()->farm_id)
                $query->where('code', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('code', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('name', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('breed', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('sex', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('mother', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('father', 'ilike', '%' . $data['search'] . '%')
                    ->get();
        });

        return $animals->get();
    }
}
