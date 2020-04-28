<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'photo'
    ];

    public function setPasswordAttribute($value)
    {
        if($value == '******'){

        }else{
          $this->attributes['password'] = Hash::make($value);
        }
    }

}
