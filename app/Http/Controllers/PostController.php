<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\News;
use App\User;
use App\Category;
use App\Tag;

use Hash;
use Session;
use Input;

class PostController extends Controller
{
  protected $paginateLimit = 5;



  public function getPosts(){

    // \DB::enableQueryLog();
    $news = News::with('author', 'category', 'tags')
                ->latestFirst()
                ->published()
                ->filterSearchTerm( request('term') )
                ->paginate($this->paginateLimit);
    //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
    return view('simplePages.news.newslist', compact('news'));//->withNews($news);//, ['users' => $users]);
    // view('simplePages.news.newslist', compact('news'))->render();
    // dd(\DB::getQueryLog());

  }

  public function showPost(News $item){
    //\DB::enableQueryLog();

    // if( empty($item['slug']) ) return view('errors.404');
    //dd($item);
    $item->increment('view_count');
    return view('simplePages.news.news', compact('item'));//, ['users' => $users]);
    //view('simplePages.news', compact('item'))->render();
    //dd(\DB::getQueryLog());
  }

  public function category(Category $category){

    //\DB::enableQueryLog();

    $categoryName = $category->title;
    $news = $category
                    ->news()
                    ->with('author', 'tags')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->paginateLimit);
    //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
    return view('simplePages.news.newslist', compact('news', 'categoryName'));//->withNews($news);//, ['users' => $users]);
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
                    ->with('category', 'tags')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->paginateLimit);

    return view('simplePages.news.newslist', compact('news', 'authorName'));

    //dd(\DB::getQueryLog());
  }

  public function tag(Tag $tag)
    {
        $tagName = $tag->name;
//dd($tagName);
        $news = $tag->news()
                          ->with('author', 'category')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->paginateLimit);

         return view("simplePages.news.newslist", compact('news', 'tagName'));
    }
}
