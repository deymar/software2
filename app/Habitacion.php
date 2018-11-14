<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Habitacion extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'habitacion';
    protected $guard = 'huesped';

    // protected $fillable = [
    //     'name' ,'user_name', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
