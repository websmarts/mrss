<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageElement extends Model
{
    protected $fillable = ['name', 'description', 'content', 'editor'];

    public function content()
    {
        return $this->hasOne('App\Chunk');
    }
}
