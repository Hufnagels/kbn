<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
  use SoftDeletes;
  protected $fillable = ['testi_text','slug','testi_name', 'testi_title', 'published_at'];
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


  public function publicationStatusLabel()
  {
    if (! $this->published_at)
    {
      return '<span class="tag is-danger">' . __('forms.draft') . '</span>';
    }
    elseif ($this->published_at && $this->published_at->isFuture())
    {
      return '<span class="tag is-warning">' . __('forms.scheduled') . '</span>';
    }
    else
    {
      return '<span class="tag is-success">' . __('forms.published') . '</span>';
    }
  }

  /*
  ATTRIBUTE SECTION
  */
  public function getDateAttribute($value)
  {
    //setlocale(LC_TIME, 'HU');
    return is_null($this->published_at) ? '' : $this->published_at->format('Y.M.d'); //toFormattedDateString();
    //return $this->created_at->diffForHumans();
  }

    /*
  SCOPE SECTION
  */
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

        // in news title, excerpt
        $q->orWhere('testi_text', 'LIKE', "%{$term}%");
        $q->orWhere('testi_name', 'LIKE', "%{$term}%");
        // $q->orWhere('body', 'LIKE', "%{$term}%");
      });
    }
  }

}
