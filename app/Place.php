<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'id', 'name', 'image', 'description', 'owner_id', 'category_id', 'is_best', 'is_updated', 'updated_name', 'updated_description'
    ];
}
