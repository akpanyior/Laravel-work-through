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

Route::get('/', function () {
    return view('welcome');
});
/*


    Route::get('/user/{name}', function ($name) {
    return 'This is user ' .$name;
});
});
*/

Route::get('/',  'PagesController@index'); 
Route::get('/about',  'PagesController@about'); 
Route::get('/services',  'PagesController@services');
//Route::get('/vvplaylist',  'PagesController@vvplaylist');  

Route::resource('vvplaylist', 'AudioController');
Route::resource('posts', 'PostsController');
Route::get('/posts/{title}', 'PostsController@show');
Route::get('posts/{title}/likes_count', 'PostsController@isLikedByMe');
Route::post('posts/like', 'PostsController@like');

//Route::post('dashboard', 'UsersController@dashboard');



Auth::routes();

Route::get('dashboard', 'DashboardController@index');
Route::post('dashboard', 'UsersController@update_avatar');


/*Route::get('/', 'UsersController@index');
Route::get('/file/upload', 'UsersController@create')->name('formfile');
Route::get('/file/upload', 'UsersController@store')->name('uploadfile');
Route::get('/file', 'UsersController@dropzone');
Route::post('/file/fileupload', 'UsersController@dropzone')->name('file.fileupload');

/*Route::get('/users','UsersController@index');
Route::post('/users/fileupload/','UsersController@fileupload')->name('users.fileupload');
Route::get('/users','UsersController@index');
*/




