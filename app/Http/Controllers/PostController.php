<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Role;
use Hash;
use Session;
use Input;

class PostController extends Controller
{
  //
  public function index(){
    $posts = Post::orderBy('id', 'asc')->paginate(2); //all();
    return view('manage.posts.index')->withUsers($posts);//, ['users' => $users]);
  }
}
