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


Route::group(['middleware' => 'auth'], function () {
});

// / GOOGLE CALENDAR SECTION TOO FOR OAUTH request (outside auth middleware)
Route::get('/manage/calendar/oauth', 'Manage\GoogleCalendarController@oauth')->name('calendar.oauthCallback');

Auth::routes();


Route::prefix('manage')->group(function(){
  Route::get('/', 'Manage\ManageController@index');

  // INDIVIDUAL FILEMANAGER MENU FOR UNISHARP FILEMANAGER
  Route::get('/filemanager', 'Manage\ManageController@filemanager')->name('fm.show');;

  // UNISHARP FILEMANAGER IN NEWS MENU
  Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
  Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');

  // MANAGE USER PROFILE
  Route::get('/edit-account', 'Manage\ManageController@edit')->name('manage.account-edit');
  Route::put('/edit-account', 'Manage\ManageController@update')->name('manage.account-update');

  // DASHBOARD
  Route::get('/dashboard', 'Manage\ManageController@dashboard')->name('manage.dashboard');

  // MANAGE USERS
  Route::delete('/users/confirm/{user}', 'Manage\UsersController@confirm')->name('users.confirm');
  Route::put('/users/restore/{user}', 'Manage\UsersController@restore')->name('users.restore');
  Route::delete('/users/force-destroy/{user}', 'Manage\UsersController@forcedestroy')->name('users.force-destroy');
  Route::resource('/users', 'Manage\UsersController');

  // MANAGE USERS ROLE AND PERMISSIONS
  Route::resource('/permissions', 'Manage\PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'Manage\RoleController', ['except' => 'destroy']);

  // MANAGE NEWS
  Route::put('/post/restore/{post}', 'Manage\NewsController@restore')->name('post.restore');
  Route::delete('/post/force-destroy/{post}', 'Manage\NewsController@forcedestroy')->name('post.force-destroy');
  Route::resource('/post', 'Manage\NewsController');

  // SEARCH SECTION
  Route::put('/category/restore/{category}', 'Manage\CategoriesController@restore')->name('category.restore');
  Route::delete('/category/force-destroy/{category}', 'Manage\CategoriesController@forcedestroy')->name('category.force-destroy');
  Route::resource('/category', 'Manage\CategoriesController');

  Route::put('/tag/restore/{tag}', 'Manage\TagController@restore')->name('tag.restore');
  Route::delete('/tag/force-destroy/{tag}', 'Manage\TagController@forcedestroy')->name('tag.force-destroy');
  Route::resource('/tag', 'Manage\TagController');

  // GOOGLE CALENDAR SECTION
  Route::resource('/calendar', 'Manage\GoogleCalendarController');

  // GOOGLE YOUTUBE SECTION

  // PHOTOS SECTION
  Route::resource('/photo', 'Manage\PhotoController', ['except' => 'destroy']);

  // VIDEOS SECTION
  Route::resource('/video', 'Manage\VideoController', ['except' => 'destroy']);

});


Route::get('/home', 'Manage\ManageController@index')->name('home');
