<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\News;
use App\User;
use App\Category;

use Hash;
use Session;
use Input;

class PostController extends Controller
{
  protected $paginateLimit = 5;

  public function index(){
    $posts = News::orderBy('id', 'asc')->paginate(2); //all();
    return view('manage.news.index')->withUsers($posts);//, ['users' => $users]);
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
    $item->increment('view_count');
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
  public function author(User $author){

    //\DB::enableQueryLog();
    /**
    * variable name must be equal with in the route
    * Route::get('/news/author/{author}', 'PostController author')->name('news.author');
    **/
    $authorName = $author->name;
    $news = $author
                    ->news()
                    ->with('category')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->paginateLimit);

    return view('simplePages.newslist', compact('news', 'authorName'));

    //dd(\DB::getQueryLog());
  }
}
