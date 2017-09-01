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
Route::post('/contact', 'PagesController@postContact')->name('contact');
Route::get('/about', 'PagesController@getAbout')->name('about');
Route::get('/team', 'PagesController@getTeam')->name('team');

Route::get('/projects/{project}', 'PostController@showProject')->name('projects.show');
Route::get('/projects', 'PostController@getProjects')->name('projects');

Route::get('/news/author/{author}', 'PostController@author')->name('news.author');
Route::get('/news/category/{category}', 'PostController@category')->name('news.category');
Route::get('/news/tag/{tag}', 'PostController@tag')->name('news.tags');

Route::get('/news/{news}', 'PostController@showPost')->name('news.show');
Route::get('/news', 'PostController@getPosts')->name('newses');
Route::get('/', 'PagesController@getIndex')->name('welcome');




Auth::routes();

Route::prefix('manage')->group(function(){
  Route::get('/', 'Manage\ManageController@index');
  Route::get('/edit-account', 'Manage\ManageController@edit')->name('manage.account-edit');
  Route::put('/edit-account', 'Manage\ManageController@update')->name('manage.account-update');

  Route::get('/dashboard', 'Manage\ManageController@dashboard')->name('manage.dashboard');

  Route::delete('/users/confirm/{user}', 'Manage\UsersController@confirm')->name('users.confirm');
  Route::put('/users/restore/{user}', 'Manage\UsersController@restore')->name('users.restore');
  Route::delete('/users/force-destroy/{user}', 'Manage\UsersController@forcedestroy')->name('users.force-destroy');
  Route::resource('/users', 'Manage\UsersController');


  Route::resource('/permissions', 'Manage\PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'Manage\RoleController', ['except' => 'destroy']);

  Route::put('/post/restore/{post}', 'Manage\ManageNewsController@restore')->name('post.restore');
  Route::delete('/post/force-destroy/{post}', 'Manage\ManageNewsController@forcedestroy')->name('post.force-destroy');
  Route::resource('/post', 'Manage\ManageNewsController');

  Route::put('/category/restore/{category}', 'Manage\ManageCategoriesController@restore')->name('category.restore');
  Route::delete('/category/force-destroy/{category}', 'Manage\ManageCategoriesController@forcedestroy')->name('category.force-destroy');
  Route::resource('/category', 'Manage\ManageCategoriesController');

  Route::put('/tag/restore/{tag}', 'Manage\ManageTagController@restore')->name('tag.restore');
  Route::delete('/tag/force-destroy/{tag}', 'Manage\ManageTagController@forcedestroy')->name('tag.force-destroy');
  Route::resource('/tag', 'Manage\ManageTagController');

});

Route::get('/home', 'Manage\ManageController@index')->name('home');
