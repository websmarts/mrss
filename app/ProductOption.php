<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable = [
        'qty',
        'description',
        'price',
        'display_order',
    ];
}
