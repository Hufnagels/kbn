<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','slug', 'excerpt', 'body','image','is_published','published_at', 'category_id','view_count'];
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

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
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

    /**
    *
    * LARAVEL Attributes
    */
    public function getImageUrlAttribute($value)
    {
      $imageUrl ='';
      $imageDirectory = config('imageAttributes.image.news.directory');
      if (!is_null($this->image))
      {

        $imagePath = public_path()."/".$imageDirectory."/" . $this->image;
        if (file_exists($imagePath))
        {
          $imageUrl = asset($imageDirectory.'/'. $this->image);
        }
      } else {
        $imageUrl = asset($imageDirectory.'/250x170.png');
      }
      return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
      $imageUrl ='';
      $imageDirectory = config('imageAttributes.image.news.directory');

      if (!is_null($this->image))
      {

        $ext = substr(strrchr($this->image, '.'), 1);
        $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
        $imagePath = public_path()."/".$imageDirectory."/" . $thumbnail;
        if (file_exists($imagePath))
        {
          $imageUrl = asset($imageDirectory.'/'. $thumbnail);
        }
      } else {
        $imageUrl = asset($imageDirectory.'/250x170.png');
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
      // return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
      return $this->body ? html_entity_decode($this->body) : NULL;
    }

    public function getExcerptHtmlAttribute($value)
    {
      return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach($this->tags as $tag) {
            $anchors[] = '<small><a href="' . route('news.tags', $tag->slug) . '">' . $tag->name . '</a></small>';
        }
        return implode(", ", $anchors);
    }

    public function setPublishedAtAttribute($value)
    {
      $this->attributes['published_at'] = $value ?: NULL;
    }

      /**
    *
    * LARAVEL scopes
    */
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

}
