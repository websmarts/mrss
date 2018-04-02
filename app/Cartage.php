<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartage extends Model
{
    public $fillable = ['module_count', 'cartage_type', 'cost_per_module'];
}
