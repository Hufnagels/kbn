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
Route::get('/download', 'PagesController@download')->name('download');
Route::get('/contact', 'PagesController@getcontact')->name('contact');
Route::post('/contact', 'PagesController@postContact')->name('contact');
Route::get('/about', 'PagesController@getAbout')->name('about');
Route::get('/team', 'PagesController@getTeam')->name('team');
Route::get('/enigma', 'PagesController@enigma')->name('enigma');
// Route::get('/enigma/challenge', 'PagesController@enigmaTasks')->name('enigmatasks');

Route::get('/projects/{project}', 'PostController@showProject')->name('projects.show');
Route::get('/projects', 'PostController@getProjects')->name('projects');

Route::get('/news/author/{author}', 'PostController@author')->name('news.author');
Route::get('/news/category/{category}', 'PostController@category')->name('news.category');
Route::get('/news/tag/{tag}', 'PostController@tag')->name('news.tags');

Route::get('/news/{news}', 'PostController@showPost')->name('news.show');
Route::get('/news', 'PostController@getPosts')->name('newses');
Route::get('/', 'PagesController@getIndex')->name('welcome');


//Route::post('/login', 'Auth\LoginController@logout')->name('logout');



// / GOOGLE CALENDAR SECTION TOO FOR OAUTH request (outside auth middleware)
Route::get('/manage/calendar/oauth', 'Manage\GoogleCalendarController@oauth')->name('calendar.oauthCallback');


Route::group(['middleware' => 'auth'], function () { });

Auth::routes();
Route::post('/register', 'Auth\RegisterController@index')->name('register');
  Route::get('/enigma/challenge', 'PagesController@enigmaTasks')->name('enigmatasks');

  Route::prefix('manage')->group(function(){
    Route::get('/', 'Manage\ManageController@index');

    // NOTIFICATIONS
    Route::get('/notifications', 'Manage\NotificationController@index')->name('notification.list');
    Route::get('/notifications/{notification}', 'Manage\NotificationController@view')->name('notification.view');
    Route::post('/notifications/{notification}', 'Manage\NotificationController@updateStatus')->name('notification.update');
    Route::delete('/notifications/{notification}', 'Manage\NotificationController@forcedestroy')->name('notification.destroy');

    // DASHBOARD
    Route::get('/dashboard', 'Manage\ManageController@dashboard')->name('manage.dashboard');

    // INDIVIDUAL FILEMANAGER MENU FOR UNISHARP FILEMANAGER
    Route::get('/filemanager', 'Manage\ManageController@filemanager')->name('fm.show');;

    // UNISHARP FILEMANAGER IN NEWS MENU
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');

    // MANAGE USER PROFILE
    Route::get('/edit-account', 'Manage\ManageController@edit')->name('manage.account-edit');
    Route::put('/edit-account', 'Manage\ManageController@update')->name('manage.account-update');

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

    // MANAGE EVENTS
    Route::put('/event/restore/{event}', 'Manage\EventController@restore')->name('event.restore');
    Route::delete('/event/force-destroy/{event}', 'Manage\EventController@forcedestroy')->name('event.force-destroy');
    Route::resource('/event', 'Manage\EventController');

    // MANAGE INSTRUCTION
    Route::put('/instruction/restore/{instruction}', 'Manage\InstructionController@restore')->name('instruction.restore');
    Route::delete('/instruction/force-destroy/{instruction}', 'Manage\InstructionController@forcedestroy')->name('instruction.force-destroy');
    Route::resource('/instruction', 'Manage\InstructionController');

    // MANAGE LESSION
    Route::put('/lession/restore/{lession}', 'Manage\LessionController@restore')->name('lession.restore');
    Route::delete('/lession/force-destroy/{lession}', 'Manage\LessionController@forcedestroy')->name('lession.force-destroy');
    Route::resource('/lession', 'Manage\LessionController');

    // MANAGE TESTIMONIALS ON INDEX PAGE
    Route::put('/testimonial/restore/{testimonial}', 'Manage\TestimonialController@restore')->name('testimonial.restore');
    Route::delete('/testimonial/force-destroy/{testimonial}', 'Manage\TestimonialController@forcedestroy')->name('testimonial.force-destroy');
    Route::resource('/testimonial', 'Manage\TestimonialController');

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
    Route::put('/video/restore/{video}', 'Manage\VideoController@restore')->name('video.restore');
    Route::delete('/video/force-destroy/{video}', 'Manage\VideoController@forcedestroy')->name('video.force-destroy');
    Route::resource('/video', 'Manage\VideoController');

  });


Route::get('/home', 'Manage\ManageController@index')->name('home');
