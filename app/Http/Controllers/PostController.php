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
  protected $paginateLimit = 9;


  /*
  * PROJECTS CATEGORY in NEWS
  */
  public function getProjects(){

    // \DB::enableQueryLog();
    $news = News::with('author', 'category', 'tags')
                ->latestFirst()
                ->published()
                ->where('category_id',2)
                ->filterSearchTerm( request('term') )
                ->paginate($this->paginateLimit);
    //$news = News::orderBy('created_at', 'desc')->with('author')->paginate(5);
    return view('simplePages.projects.projectlist', compact('news'));//->withNews($news);//, ['users' => $users]);
    // view('simplePages.news.newslist', compact('news'))->render();
    // dd(\DB::getQueryLog());

  }

  public function showProject(News $item){
    //\DB::enableQueryLog();
    $item->increment('view_count');
    return view('simplePages.projects.project', compact('item'));//, ['users' => $users]);
    //view('simplePages.news', compact('item'))->render();
    //dd(\DB::getQueryLog());
  }

  /*
  * NEWS SECTION
  */
  public function getPosts(){
  //   $post = News::find(1);
  //
  // foreach ($post->tags as $tag) {
  //     echo $tag;
  // }
  // die();
    // \DB::enableQueryLog();
    $news = News::with('author', 'category', 'tags')
                ->latestFirst()
                ->published()
                ->where('category_id','<>', 2)
                ->filterSearchTerm( request('term') )
                ->paginate($this->paginateLimit);

    return view('simplePages.news.newslist', compact('news'));
    // view('simplePages.news.newslist', compact('news'))->render();
    // dd(\DB::getQueryLog());

  }

  public function showPost(Request $request, News $item){
    //\DB::enableQueryLog();

    $postkey = 'post_'.$item->id;
    //$request->session()->forget($postkey);
    // Check if blog session key exists
    // If not, update view_count and create session key
    if (!Session::has($postkey)) {
        $item->increment('view_count');
        Session::put($postkey, 1);
    }
    //$item->increment('view_count');
    //dd($request->session()->all());

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
        $news = $tag->news()
                          ->with('author', 'category')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->paginateLimit);

         return view("simplePages.news.newslist", compact('news', 'tagName'));
    }
}
