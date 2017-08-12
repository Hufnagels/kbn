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

      //\DB::enableQueryLog();
      $news = News::with('author')->latestFirst()->published()->paginate($this->paginateLimit);
      //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
      return view('simplePages.newslist', compact('news'));//->withNews($news);//, ['users' => $users]);
      //view('simplePages.newslist', compact('news'))->render();
      //dd(\DB::getQueryLog());

    }

    public function showPost(News $item){
      //\DB::enableQueryLog();

      // if( empty($item['slug']) ) return view('errors.404');
      //dd($item);
      return view('simplePages.news', compact('item'));//, ['users' => $users]);
      //view('simplePages.news', compact('item'))->render();
      //dd(\DB::getQueryLog());
    }

    public function getEvents(){

    }
    public function category(Category $category){

      //\DB::enableQueryLog();

      $categoryName = $category->title;
      $news = $category
                      ->news()
                      ->with('author')
                      ->latestFirst()
                      ->published()
                      ->paginate($this->paginateLimit);
      //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
      return view('simplePages.newslist', compact('news', 'categoryName'));//->withNews($news);//, ['users' => $users]);
      //view('simplePages.newslist', compact('news'))->render();
      //dd(\DB::getQueryLog());
    }

}
