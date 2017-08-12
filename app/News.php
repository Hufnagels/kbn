<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class News extends Model
{

    protected $dates = ['published_at'];
/* implicit model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
*/
    public function getRouteKeyName()
    {
      return 'slug';
    }

    //Author in user table
    public function author()
    {
      return $this->belongsTo(User::class);
    }

    //Category in categories table
    public function category()
    {
      return $this->belongsTo(Category::class);
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

    public function getBodyHtmlAttribute($value)
    {
      return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute($value)
    {
      return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    public function scopeLatestFirst($query)
    {
      return $query->orderBy('published_at', 'desc');
    }

    public function scopePopular($query)
    {
      return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query)
    {
      return $query->where('published_at', '<=', Carbon::now());
    }
}
