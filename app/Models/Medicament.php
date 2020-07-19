<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $table = 'medicaments';

    protected $fillable = [
        'name',
        'active_principle',
        'grace_period_beef',
        'grace_period_dairy',
        'flyer',
        'thumbnail',
        'farm_id'
    ];

    protected $dates = ['deleted_at'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
