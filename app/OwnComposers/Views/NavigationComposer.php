<?php

namespace App\OwnComposers\Views;

use Illuminate\View\View;

use App\Category;
use App\News;

class NavigationComposer
{
  public function compose(View $view)
  {
    $this->composeNewsCategories($view);

    $this->composeNewsPopularPosts($view);

    // $this->composeNewsPopularPostsInMainNav($view);
  }

  public function composeNewsCategories(View $view)
  {
    $categories = Category::with(['news' => function($query){
      $query->published();
    }])->orderBy('title', 'asc')->get();

    $view->with('categories' , $categories);
  }

  public function composeNewsPopularPosts(View $view)
  {
    $popularposts = News::published()->popular()->take(3)->get();

    $view->with( 'popularposts' , $popularposts);
  }

  // public function composeNewsPopularPostsInMainNav(View $view)
  // {
  //   $popularposts = News::published()->popular()->take(3)->get();
  //
  //   $view->with( 'popularposts' , $popularposts);
  // }

}
