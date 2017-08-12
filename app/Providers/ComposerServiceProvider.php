<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Category;
use App\News;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('simplePages.sidebar', function($view){
          $categories = Category::with(['news' => function($query){
            $query->published();
          }])->orderBy('title', 'asc')->get();

          return $view->with('categories' , $categories);
        });

        view()->composer('simplePages.sidebar', function($view){

          $popularposts = News::published()->popular()->take(3)->get();

          return $view->with( 'popularposts' , $popularposts);
        });

        view()->composer('_includes.nav.navbar', function($view){

          $popularposts = News::published()->popular()->take(3)->get();

          return $view->with( 'popularposts' , $popularposts);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
