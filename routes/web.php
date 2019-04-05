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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Home\Blog\ArticleController@index');

Auth::routes();

Route::group(['prefix' => 'admin', ], function () {

    Route::get('/login', 'Auth\Admin\LoginController@showAdminLoginForm');
//    Route::get('/register', 'Auth\Admin\RegisterController@showAdminRegisterForm');

    Route::post('/login', 'Auth\Admin\LoginController@login');
//    Route::post('/register', 'Auth\Admin\RegisterController@create');
    Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => 'auth:admin', ], function () {
        Route::get('/', function () {
            return view('admin.home');
        });
        Route::get('/blog/articles', 'Admin\Blog\ArticleController@index')->name('admin.blog.article.list');
        Route::get('/blog/articles/new', 'Admin\Blog\ArticleController@new')->name('admin.blog.article.new');
        Route::post('/blog/articles/store', 'Admin\Blog\ArticleController@store')->name('admin.blog.article.store');
        Route::get('/blog/articles/edit/{id}', 'Admin\Blog\ArticleController@edit')->name('admin.blog.article.edit');
        Route::post('/blog/articles/update', 'Admin\Blog\ArticleController@update')->name('admin.blog.article.update');
        Route::post('/blog/articles/delete', 'Admin\Blog\ArticleController@delete')->name('admin.blog.article.delete');
        Route::post('/blog/articles/top', 'Admin\Blog\ArticleController@top')->name('admin.blog.article.top');
        Route::post('/upload/image/article', 'Admin\UploadController@image')->name('admin.upload.article.image');

        Route::get('/links/friends', 'Admin\Index\LinkController@index')->name('admin.links.friend.list');
        Route::get('/links/friends/new', 'Admin\Index\LinkController@new')->name('admin.links.friend.new');
        Route::post('/links/friends/store', 'Admin\Index\LinkController@store')->name('admin.links.friend.store');
        Route::get('/links/friends/edit/{id}', 'Admin\Index\LinkController@edit')->name('admin.links.friend.edit');
        Route::post('/links/friends/update', 'Admin\Index\LinkController@update')->name('admin.links.friend.update');
        Route::post('/links/friends/delete', 'Admin\Index\LinkController@delete')->name('admin.links.friend.delete');


        Route::get('/users/{id}', 'Admin\User\UserController@edit')->name('admin.user.edit');
        Route::post('/users', 'Admin\User\UserController@update')->name('admin.user.update');
    });
});

//Route::get('/login', function () {
//    return view('auth.login');
//});

Route::get('/friend-links', 'Home\Index\LinkController@index')->name('home.blog.link.friend');
Route::get('/{slug}', 'Home\Blog\ArticleController@show')->name('home.blog.article');
Route::get('/category/{category}', 'Home\Blog\CategoryController@show')->name('home.blog.category.show');
Route::get('/tag/{tag}', 'Home\Blog\TagController@show')->name('home.blog.tag.show');
