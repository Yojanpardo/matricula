<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable
{

	//use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = ['id', 'nombre', 'apellido', 'telefono', 'email', 'tipo', 'imagen'];

    protected $hidden = ['password', 'remember_token'];

}
