<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpleUrlShortener extends Model
{
    protected $fillable = [

        'shortLink', 'link'

    ];
}
