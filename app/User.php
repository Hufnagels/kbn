<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use GrahamCampbell\Markdown\Facades\Markdown;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function getBioHtmlAttribute($value)
    {
      return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }
}
