<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
  protected $fillable = [
      'display_name', 'description', 'name'
  ];
}
