<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'postcode',
        'suburb',
        'servive_premium',
    ];

    public $timestamps = false;
}
