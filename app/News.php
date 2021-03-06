<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;



class News extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title','slug','subtitle', 'excerpt', 'body','image','is_published','published_at', 'category_id','view_count'];
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
      return $this->morphToMany('App\Category','categoryable');
      // return $this->belongsTo(Category::class);
    }

    public function tags()
    {
      return $this->morphToMany('App\Tag','taggable');
    }


    // public function photos()
    // {
    //   return $this->morphMany('App\Photo','imageable');
    // }
    //
    // public function videos()
    // {
    //   return $this->morphMany('App\Video','videoable');
    // }


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

    /**
    *
    * LARAVEL Attributes
    */

    public function getImageUrlAttribute($value)
    {
      $imageUrl ='';

      // $imageDirectory = config('imageAttributes.image.news.directory');
      if (!is_null($this->image))
      {
        // with old upload
        //$imagePath = public_path()."/".$imageDirectory."/" . $this->image;

        //with lfm select
        $imagePath = public_path(). $this->image;
        if (file_exists($imagePath))
        {
          // with old upload
          //$imageUrl = asset($imageDirectory.'/'. $this->image);

          //with lfm select
          $imageUrl = asset( $this->image);
        } else {
          $imageUrl = NULL;
        }
      } else {
        $imageUrl = NULL; //asset($imageDirectory.'/250x170.png');
      }
      return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
      $imageUrl ='';
      // with old upload
      //$imageDirectory = config('imageAttributes.image.news.directory');

      //with lfm select

      if (!is_null($this->image))
      {
        // with old upload
        // $ext = substr(strrchr($this->image, '.'), 1);
        // $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
        // $imageWithThumbUrl = public_path()."/".$imageDirectory."/" . $thumbnail;

        $lfmThumbDir = config('lfm.thumb_folder_name'); //thumbs
        $image = $this->image;                          // /fm/photos/shares/IndexGalery/IMG_20170726_153406.jpg'
        $path_parts = pathinfo($image);
        $dirname = $path_parts['dirname'];              // /fm/photos/shares/IndexGalery
        $basename =  $path_parts['basename'];           // IMG_20170726_153406.jpg
        $thumbImage = $dirname . '/' . $lfmThumbDir . '/' . $basename;
        $imageWithThumbUrl = public_path() . $thumbImage;

        if (file_exists($imageWithThumbUrl))
        {
          // with old upload
          //$imageWithThumbUrl = asset($imageDirectory.'/'. $thumbnail);

          //with lfm select
          $imageWithThumbUrl = asset( $thumbImage);
        } else {
          $imageWithThumbUrl = NULL;
        }
      } else {
        $imageWithThumbUrl = NULL; //asset($imageDirectory.'/250x170.png');
      }
      return $imageWithThumbUrl;
    }

    public function getDateAttribute($value)
    {
      //setlocale(LC_TIME, 'HU');
      return is_null($this->published_at) ? '' : $this->published_at->format('Y.M.d'); //toFormattedDateString();
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

    public function getCategoryHtmlAttribute()
    {
        $anchors = [];
        foreach($this->category as $cat) {
          if( !($cat->id == config('ownAttributes.default_category.id')) ){
            $anchors[] = '<small><span class="tag is-danger"><a class="categoryItem" href="' . route('news.category', $cat->slug) . '">' . $cat->title . '</a></small></span>';
          }
        }
        // dd(count($anchors));
        return count($anchors) ? ( implode(" ", $anchors)) : '';
    }

    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach($this->tags as $tag) {
          if( !($tag->id == config('ownAttributes.default_tag.id')) ){
            $anchors[] = '<small><span class="tag is-dark"><a class="tagItem" href="' . route('news.tags', $tag->slug) . '">' . $tag->name . '</a></small></span>';
          }
        }
        // dd(count($anchors));
        return count($anchors) ? ( implode(" ", $anchors)) : '';
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
