<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place_rate extends Model
{
    protected $fillable = [
        'id', 'rate', 'place_id', 'user_id'
    ];
}
