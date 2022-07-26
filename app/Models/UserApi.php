<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;


class UserApi extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'last_name',
        'identification_type',
        'identification_number',
        'birth_date',
        'password',
        'created_at',
        'uodated_at'
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }   
}
