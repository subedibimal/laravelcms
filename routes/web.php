<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::redirect('/','/en'); 


// Route::group(['prefix'=>'{language}'], function(){

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return "about page";
});

Auth::routes();
Route::get('/post/{id}', 'AdminPostsController@post')->name('home.post');

Route::group(['middleware'=>'admin'],function(){
Route::get('/admin',function () {return view('admin.index'); });
Route::resource('admin/comments', 'PostCommentsController');
Route::resource('admin/comment/replies', 'CommentRepliesController');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/users','AdminUsersController')->except('show');
Route::resource('admin/posts','AdminPostsController')->except('show');
Route::resource('admin/categories','AdminCategoriesController');
Route::resource('admin/media','AdminMediaController')->except('show');
// Route::post('admin/media/upload','AdminMediaController@store')->name('media.upload');
});
// });
Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply')->name('comment.createreply');
});