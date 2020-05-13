<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Сities extends Model
{
    protected $fillable = [

        'name', 'latitude', 'longitude', 'population'

    ];
}
