<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'about_ar', 'about_en', 'terms_ar', 'terms_en'
    ];
}
