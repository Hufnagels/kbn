<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

  use SoftDeletes;

  protected $fillable = ['title','slug','type'];


  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function news()
  {
    return $this->morphedByMany('App\News','categoryable');
    // return $this->hasMany(News::class);
  }
}
