<?php

namespace AppFinancial\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier ()
    {
        return $this->id;
    }

    public function getJWTCustomClaims ()
    {
        return [
            'user' => [
                'id'    => $this->id,
                'name'  => $this->name,
                'email' => $this->email,
            ],
        ];
    }
}
