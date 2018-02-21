<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'published'];

/**
 * if a page element with name == $name exists
 * the return the elements 'content'
 * @method element
 * @param  [type]  $name [description]
 * @return [type]        [description]
 */
    public function element($name)
    {
        if (
            !$name ||
            !$element = $this->elements->where('name', $name)->first()
        ) {
            return;
        }

        return $this->elements->where('name', $name)->first();
    }

    public function elements()
    {
        return $this->hasMany('App\PageElement');
    }
}
