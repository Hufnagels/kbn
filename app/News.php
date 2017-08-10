<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{

    protected $dates = ['published_at'];
/* implicit model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
*/
    public function author()
    {
      return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute($value)
    {
      $imageUrl ='';
      if (!is_null($this->image))
      {
        $imagePath = public_path()."/images/news/" . $this->image;
        if (file_exists($imagePath))
        {
          $imageUrl = asset('images/news/'. $this->image);
        }
      } else {
        $imageUrl = asset('images/news/128x128.png');
      }
      return $imageUrl;
    }

    public function getDateAttribute($value)
    {
      //setlocale(LC_TIME, 'HU');
      return is_null($this->published_at) ? '' : $this->published_at->toFormattedDateString();
      //return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {
      return $query->orderBy('published_at', 'desc');
    }

    public function scopePublished($query)
    {
      return $query->where('published_at', '<=', Carbon::now());
    }
}
