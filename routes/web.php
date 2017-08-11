<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/contact', 'PagesController@getcontact')->name('contact');
Route::get('/about', 'PagesController@getAbout')->name('about');
Route::get('/team', 'PagesController@getTeam')->name('team');
Route::get('/news/{category}', 'PagesController@category')->name('news.category');
Route::get('/news/{news}', 'PagesController@showPost')->name('news.show');
Route::get('/news', 'PagesController@getPosts')->name('newses');
Route::get('/', 'PagesController@getIndex')->name('welcome');




Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author')->group(function(){
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users', 'UserController');
  Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
  //Route::resource('/posts', 'PostController', ['except' => 'destroy']);
});

Route::get('/home', 'HomeController@index')->name('home');
