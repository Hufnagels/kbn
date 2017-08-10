<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Role;
use Hash;
use Session;
use Input;

class NewsController extends Controller
{
  //
  public function index(){
    $posts = News::orderBy('id', 'asc')->paginate(2); //all();
    return view('manage.news.index')->withUsers($posts);//, ['users' => $users]);
  }
}
