<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\News;
use App\User;

class PagesController extends Controller
{
    protected $paginateLimit = 5;


    public function getIndex(){
      return view('simplePages.index');
    }

    public function getAbout(){
      return view('simplePages.about');
    }

    public function getTeam(){
      return view('simplePages.team');
    }

    public function getContact(){
      Mapper::map(
        47.4875518,
        19.0335221,
        [
            'zoom' => 15,
            'center' => true,
            'scrollWheelZoom' => false,
            'fullscreenControl' => false,
        ]
      );

      return view('simplePages.contact');
    }

    public function postContact(){
      return view('simplePages.postContactForm');
    }

    public function getPosts(){
      //\DB::enableQueryLog();
      $news = News::with('author')->latestFirst()->published()->paginate($this->paginateLimit);
      //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
      return view('simplePages.newslist', compact('news'));//->withNews($news);//, ['users' => $users]);
      //view('simplePages.newslist', compact('news'))->render();
      //dd(\DB::getQueryLog());

    }

    public function showPost($slug){
      //$user = User::where('id', $id)->with('roles')->first();
      //$user = User::findOrFail($id);
      //return view('manage.users.edit')->withUser($user)->withRoles($roles);
      //die("news");
      $item = News::findOrFail($slug);
      return view('simplePages.news', compact('item'));//, ['users' => $users]);
    }

    public function getEvents(){

    }

}
