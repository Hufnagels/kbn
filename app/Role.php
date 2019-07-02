<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
  protected $fillable = [
      'display_name', 'description', 'name'
  ];

  public function user()
  {
    return $this->hasMany(User::class, 'id');
  }

  // SCOPES
  // public function scopeTeacher($query)
  // {
  //   return $query->where('name', 'teacher');
  // }

  public function scopeStudents($query)
  {
    return $query->where('name', 'student');
  }
}
