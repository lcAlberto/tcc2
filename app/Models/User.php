<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'thumbnail',
        'farm_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    /*RELACONAMENTOS*/

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    /*SEARCH*/
    public function search($data)
    {
        $animals = $this->where(function ($query) use ($data) {
            if (isset($data['search']))
//                $query->where('farm_id', '=', auth()->user()->farm_id)
                $query->where('name', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('email', 'ilike', '%' . $data['search'] . '%')
                    ->orWhere('phone', 'ilike', '%' . $data['search'] . '%')
                    ->get();
        });

        return $animals->get();
    }
}
