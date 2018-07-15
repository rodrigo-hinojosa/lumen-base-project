<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use SoftDeletes, HasApiTokens, Authenticatable, Authorizable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type_id',
        'user_state_id',
        'name',
        'lastname',
        'email',
        'username',
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relationship with UserState model
     */
    public function state()
    {
        return $this->belongsTo(UserState::class);
    }

    /**
     * Relationship with UserType model
     */
    public function type()
    {
        return $this->belongsTo(UserType::class);
    }

    /**
     * Function for hash password
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Function for auth2
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
}
