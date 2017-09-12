<?php

namespace App\OwnComposers\Views;

use Illuminate\View\View;

use App\News;
use App\Category;
use App\Tag;
use App\Testimonial;

class NavigationComposer
{
  public function compose(View $view)
  {
    $this->composeNewsCategories($view);

    $this->composeNewsTags($view);

    $this->composeNewsPopularPosts($view);

    $this->composeNewsWithImages($view);

    $this->composeNewsWithProjectCategory($view);

    $this->composeTestimonialSlider($view);


    // $this->composeNewsPopularPostsInMainNav($view);
  }

// NEWS SECTION
  public function composeNewsCategories(View $view)
  {
    // $categories = Category::where('id', '<>', config('ownAttributes.default_category.id'))
    //   ->with(['news' => function($query){
    //     $query->published();
    //     }])
    //   ->orderBy('title', 'asc')->get();


    $categories = Category::has('news')
        ->where('id', '<>', config('ownAttributes.default_category.id'))
        ->with(['news' => function($query){
            $query->published();
            }])
        ->get();//all();
// dd($categories);
    $view->with('categories' , $categories);
  }

  public function composeNewsTags(View $view)
  {
    $tags = Tag::has('news')
      ->where('id', '<>', config('ownAttributes.default_tag.id'))
      ->get();//all();
    $view->with( 'tags' , $tags);
  }

  public function composeNewsPopularPosts(View $view)
  {
    $popularposts = News::published()
      ->popular()
      ->take(3)
      ->get();
    $view->with( 'popularposts' , $popularposts);
  }

// PAGES HEADER BOXES
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
