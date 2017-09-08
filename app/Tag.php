<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
  use SoftDeletes;

  protected $fillable = ['name', 'slug'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function news()
  {
    return $this->morphedByMany('App\News','taggable');
  }

  public function instruction()
  {
    return $this->morphedByMany('App\Instruction','taggable');
  }

  public function lession()
  {
    return $this->morphedByMany('App\Lession','taggable');
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

  public function photos()
  {
    return $this->morphedByMany('App\Photo','taggable');
  }

}
