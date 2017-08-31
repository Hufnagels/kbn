<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = ['name', 'slug'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function news()
  {
    return $this->morphedByMany('App\News','taggable');
  }

  // public function events()
  // {
  //   return $this->morphByMany('App\Event','taggable');
  // }
  //
  public function videos()
  {
    return $this->morphedByMany('App\Video','taggable');
  }

  // public function photos()
  // {
  //   return $this->morphByMany('App\Photo','taggable');
  // }

}
