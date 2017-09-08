<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lession extends Model
{
  use SoftDeletes;
  protected $fillable = ['title','slug','subtitle', 'excerpt', 'body','image','is_published','published_at', 'view_count', 'category_id'];
  protected $dates = ['published_at'];

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
    return $this->morphToMany('App\Category','categoryable');
    // return $this->belongsTo(Category::class);
  }

  //Tag in tags table
  public function tags()
  {
    return $this->morphToMany('App\Tag','taggable');
  }

  public function instruction()
  {
    return $this->morphedByMany('App\Instruction','lessionable');
  }

  public function publicationStatusLabel()
  {
    if (! $this->published_at)
    {
      return '<span class="tag is-danger">Draft</span>';
    }
    elseif ($this->published_at && $this->published_at->isFuture())
    {
      return '<span class="tag is-warning">Scheduled</span>';
    }
    else
    {
      return '<span class="tag is-success">Published</span>';
    }
  }

  /*
  ATTRIBUTE SECTION
  */


  /*
  SCOPE SECTION
  */
  public function scopeLatestFirst($query)
  {
    return $query->orderBy('published_at', 'desc');
  }
  public function scopeWithImages($query)
  {
    return $query->where('image','<>', NULL);
  }

  public function scopePopular($query)
  {
    return $query->orderBy('view_count', 'desc');
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

  public function scopeFilterSearchTerm($query, $term)
  {
    if($term)
    {
      $query->where(function($q) use ($term)
      {
        // in users table as author name
        $q->whereHas('author', function($qr) use ($term)
        {
          $qr->where('name', 'LIKE', "%{$term}%");
        });

        // in categories table as category title
        $q->orwhereHas('category', function($qr) use ($term)
        {
          $qr->where('title', 'LIKE', "%{$term}%");
        });

        // in news title, excerpt
        $q->orWhere('title', 'LIKE', "%{$term}%");
        $q->orWhere('excerpt', 'LIKE', "%{$term}%");
        // $q->orWhere('body', 'LIKE', "%{$term}%");
      });
    }
  }

  public function scopeFilterNotProjectCategory($query)
  {
      $query->where(function($q)
      {
        $q->whereHas('category', function($qr)
        {
          $qr->where('id', '<>', config('ownAttributes.default_project_category.id'));
        });

      });
  }

  public function scopeFilterProjectCategory($query)
  {
      $query->where(function($q)
      {
        $q->whereHas('category', function($qr)
        {
          $qr->where('id',  config('ownAttributes.default_project_category.id'));
        });

      });
  }
}
