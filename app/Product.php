<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_group',
        'name',
        'description',
        'notes',
        'display_order',
        'payment_period',
        'image_path',
    ];

    public function options()
    {
        return $this->hasMany('App\ProductOption');
    }
}
