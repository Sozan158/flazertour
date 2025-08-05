<?php

namespace App\Models\clients;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'IDUser';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;



    protected $fillable = [
        'google_id',
        'fullname',
        'username',
        'password',
        'email',
        'phone',
        'address',
        'status',
        'role',
        'active',
        'activation_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
