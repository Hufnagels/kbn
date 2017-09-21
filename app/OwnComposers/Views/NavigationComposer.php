<?php

namespace App\OwnComposers\Views;

use Illuminate\View\View;

use App\News;
use App\Category;
use App\Tag;
use App\Testimonial;
use App\Video;

class NavigationComposer
{
  public function compose(View $view)
  {
    //NAVBAR
    $this->composeNavbarNewsPopularPosts($view);

    // NEWS PAGE SIDEBAR
    $this->composeSidebarNewsCategories($view);
    $this->composeSidebarNewsTags($view);
    $this->composeSidebarNewsPopularPosts($view);

    // INDEXPAGE
    $this->composeNewsForIndexPage($view);
    // $this->composeNewsWithImages($view);
    // $this->composeNewsWithProjectCategory($view);
    $this->composeTestimonialSlider($view);
    $this->composeVideosForIndexPage($view);
  }

  //NAVBAR
  //POPULAR NEWS
  public function composeNavbarNewsPopularPosts(View $view)
  {
    $navbarpopularpost = News::published()
      ->filterNotProjectCategory()
      ->popular()
      ->take(3)
      ->get();
    $view->with( 'navbarpopularpost' , $navbarpopularpost);
  }

  // NEWS PAGE SIDEBAR
  // CATEGORIES
  public function composeSidebarNewsCategories(View $view)
  {
    $categories = Category::has('news')
        ->whereNotIn('id', config('ownAttributes.not_news_categories'))
        ->with(['news' => function($query){
            $query->published();
            }])
        ->get();
    $view->with('categories' , $categories);
  }

  // TAGS
  public function composeSidebarNewsTags(View $view)
  {
    $tags = Tag::has('news')
      ->where('id', '<>', config('ownAttributes.default_tag.id'))
      ->get();//all();
    $view->with( 'tags' , $tags);
  }

  //POPULAR POST SECTION
  public function composeSidebarNewsPopularPosts(View $view)
  {
    $popularposts = News::published()
      ->popular()
      ->take(3)
      ->get();
    $view->with( 'popularposts' , $popularposts);
  }


  // INDEX PAGE HEADER BOXES
  // ver 0.2
  public function composeNewsForIndexPage(View $view)
  {
    $latestpostswithimages = News::withImages()
      // ->filterNotProjectCategory()
      ->published()
      ->latestFirst()
      ->take(4)
      ->get();
    $view->with( 'latestpostswithimages' , $latestpostswithimages);
  }

  //ver 0.1
  public function composeNewsWithImages(View $view)
  {
    $latestpostswithimages = News::withImages()
      ->filterNotProjectCategory()
      ->published()
      ->latestFirst()
      ->take(2)
      ->get();
    $view->with( 'latestpostswithimages' , $latestpostswithimages);
  }

  public function composeNewsWithProjectCategory(View $view)
  {
    $projectcategories = News::filterProjectCategory()
      ->published()
      // ->orderBy('updated_at', 'asc')
      ->latestFirst()
      ->take(2)
      ->get();
    $view->with('projectcategories' , $projectcategories);
  }

  // INDEX PAGES TESTIMONIALS
  public function composeTestimonialSlider(View $view)
  {
    $testimonials = Testimonial::published()->get();
    $view->with('testimonials' , $testimonials);
  }

  // INDEX PAGE VIDEOS
  public function composeVideosForIndexPage(View $view)
  {
    $videos = Video::published()->latestFirst()->take(3)->get();
    $view->with('videos' , $videos);
  }

// EVENTS SECTION

// OKTATASI ANYAGOK


  // public function composeNewsPopularPostsInMainNav(View $view)
  //
  // \DB::enableQueryLog();
  //   $popularposts = News::published()->popular()->take(3)->get();
  //
  // dd(\DB::getQueryLog());
  //   $view->with( 'popularposts' , $popularposts);
  // }

}
