<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place_image extends Model
{
    protected $fillable = [
        'id', 'place_id', 'image'
    ];
}
