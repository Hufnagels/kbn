<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = ['name', 'slug'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function tags()
  {
    return $this->morphToMany('App\Tag','taggable');
  }
}
