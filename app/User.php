<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'slug', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
      $this->attributes['password'] = bcrypt($value);
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function news()
    {
      /*
      * second parameter is a foreign_key
      * used for show news from author
      */
      return $this->hasMany(News::class, 'author_id');
    }

    public function instruction()
    {
      /*
      * second parameter is a foreign_key
      * used for show news from author
      */
      return $this->hasMany(Instruction::class, 'author_id');
    }

    public function lession()
    {
      /*
      * second parameter is a foreign_key
      * used for show news from author
      */
      return $this->hasMany(Lession::class, 'author_id');
    }

    public function testimonial()
    {
      /*
      * second parameter is a foreign_key
      * used for show news from author
      */
      return $this->hasMany(Testimonial::class, 'author_id');
    }

    public function video()
    {
      return $this->hasMany(Video::class, 'author_id');
    }

    public function photo()
    {
      return $this->hasMany(Video::class, 'author_id');
    }

    // ATTRIBUTES
    public function getBioHtmlAttribute($value)
    {
      return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }

    // SCOPES

    // FUNCTIONS
    
}
