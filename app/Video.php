<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
  use SoftDeletes;
  protected $fillable = ['title', 'slug','description','path', 'filename', 'url','yt_video_id','author_id','category_id','published_at','deleted_at'];
  protected $table = 'videos';

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function author()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->morphToMany('App\Category','categoryable');
    // return $this->belongsTo(Category::class);
  }

  public function tags()
  {
    return $this->morphToMany('App\Tag','taggable');
  }


  // FUNCTIONS
  public function publicationStatusLabel()
  {
    if (! $this->published_at)
    {
      return '<span class="tag is-danger">' . __('forms.draft') . '</span>';
    }
    elseif ($this->published_at && Carbon::parse($this->published_at)->isFuture())
    {
      return '<span class="tag is-warning">' . __('forms.scheduled') . '</span>';
    }
    else
    {
      return '<span class="tag is-success">' . __('forms.published') . '</span>';
    }
  }

  // SCOPES
  public function scopeLatestFirst($query)
  {
    return $query->orderBy('published_at', 'desc');
  }

  public function scopePublished($query)
  {
    return $query->where('published_at', '<=', Carbon::now());
  }

  public function scopeScheduled($query)
  {
    return $query->where('published_at', '>', Carbon::now());
  }

  public function scopeDraft($query)
  {
    return $query->whereNull('published_at');
  }

  // ATTRIBUTES
}
