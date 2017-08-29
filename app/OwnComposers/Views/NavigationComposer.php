<?php

namespace App\OwnComposers\Views;

use Illuminate\View\View;

use App\Category;
use App\News;
use App\Tag;

class NavigationComposer
{
  public function compose(View $view)
  {
    $this->composeNewsCategories($view);

    $this->composeNewsTags($view);

    $this->composeNewsPopularPosts($view);

    $this->composeNewsWithImages($view);

    $this->composeNewsCategoryProjects($view);
    // $this->composeNewsPopularPostsInMainNav($view);
  }

  public function composeNewsCategories(View $view)
  {
    $categories = Category::with(['news' => function($query){
      $query->published();
    }])->orderBy('title', 'asc')->get();

    $view->with('categories' , $categories);
  }

  public function composeNewsTags(View $view)
  {
    $tags = Tag::has('news')->get();//all();

    $view->with( 'tags' , $tags);
  }

  public function composeNewsPopularPosts(View $view)
  {
    $popularposts = News::published()->popular()->take(3)->get();
//dd( $popularposts );
    $view->with( 'popularposts' , $popularposts);
  }

  public function composeNewsWithImages(View $view)
  {
    $latestpostswithimages = News::withImages()->published()->take(3)->get();
// dd( $latestpostswithimages );
    $view->with( 'latestpostswithimages' , $latestpostswithimages);
  }

  public function composeNewsCategoryProjects(View $view)
  {
// \DB::enableQueryLog();
    $projectcategories = News::filterProjectCategory()
      ->published()
      ->orderBy('updated_at', 'asc')
      ->take(2)
      ->get();
// dd($projectcategories);
// dd(\DB::getQueryLog());
    $view->with('projectcategories' , $projectcategories);
  }
  // public function composeNewsPopularPostsInMainNav(View $view)
  // {
  //   $popularposts = News::published()->popular()->take(3)->get();
  //
  //   $view->with( 'popularposts' , $popularposts);
  // }

}
