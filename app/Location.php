<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'postcode',
        'suburb',
        'service_premium',
    ];

    public $timestamps = false;
}
