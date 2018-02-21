<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chunk extends Model
{
    protected $fillable = ['name', 'description', 'content'];

}
