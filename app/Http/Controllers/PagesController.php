<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use Carbon\Carbon;

use App\News;
use App\User;
use App\Category;


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

      $categories = Category::with(['news' => function($query){
        $query->published();
      }])->orderBy('title', 'asc')->get();
      
      //\DB::enableQueryLog();
      $news = News::with('author')->latestFirst()->published()->paginate($this->paginateLimit);
      //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
      return view('simplePages.newslist', compact('news', 'categories'));//->withNews($news);//, ['users' => $users]);
      //view('simplePages.newslist', compact('news'))->render();
      //dd(\DB::getQueryLog());

    }

    public function showPost(News $item){
      //$user = User::where('id', $id)->with('roles')->first();
      //$user = User::findOrFail($id);
      //return view('manage.users.edit')->withUser($user)->withRoles($roles);
      //die("news");
      //\DB::enableQueryLog();
      //$item = News::published()->where('slug', $slug)->first();//findOrFail($slug);
      if( empty($item['slug']) ) return view('errors.404');
      return view('simplePages.news', compact('item'));//, ['users' => $users]);
      //view('simplePages.news', compact('item'))->render();
      //dd(\DB::getQueryLog());
    }

    public function getEvents(){

    }
    public function category($id){
      $categories = Category::with(['news' => function($query){
        $query->published();
      }])->orderBy('title', 'asc')->get();

      //\DB::enableQueryLog();
      $news = News::with('author')
                    ->latestFirst()
                    ->published()
                    ->where('category_id', $id)
                    ->paginate($this->paginateLimit);
      //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
      return view('simplePages.newslist', compact('news', 'categories'));//->withNews($news);//, ['users' => $users]);
      //view('simplePages.newslist', compact('news'))->render();
      //dd(\DB::getQueryLog());
    }

}
