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
//        Route::post('/upload/file', 'Admin\UploadController@file')->name('admin.upload.file');

        Route::get('/links/friends', 'Admin\Index\LinkController@index')->name('admin.links.friend.list');
        Route::get('/links/friends/new', 'Admin\Index\LinkController@new')->name('admin.links.friend.new');
        Route::post('/links/friends/store', 'Admin\Index\LinkController@store')->name('admin.links.friend.store');
        Route::get('/links/friends/edit/{id}', 'Admin\Index\LinkController@edit')->name('admin.links.friend.edit');
        Route::post('/links/friends/update', 'Admin\Index\LinkController@update')->name('admin.links.friend.update');
        Route::post('/links/friends/delete', 'Admin\Index\LinkController@delete')->name('admin.links.friend.delete');
        Route::get('/upload/files/new', 'Admin\Index\UploadController@add')->name('admin.upload.file.new');
        Route::post('/upload/files/store', 'Admin\Index\UploadController@upload')->name('admin.upload.file.store');
        Route::get('/upload/files/all', 'Admin\Index\UploadController@all')->name('admin.upload.file.all');


        Route::get('/users/{id}', 'Admin\User\UserController@edit')->name('admin.user.edit');
        Route::post('/users', 'Admin\User\UserController@update')->name('admin.user.update');

        Route::get('/info/{id}', 'Admin\Index\InfoController@edit')->name('admin.info.edit');
        Route::post('/info', 'Admin\Index\InfoController@update')->name('admin.info.update');
        Route::get('/switches', 'Admin\Index\SwitchController@edit')->name('admin.switch.edit');
        Route::post('/switches', 'Admin\Index\SwitchController@update')->name('admin.switch.update');
        Route::get('/settings', 'Admin\Index\SettingController@edit')->name('admin.setting.edit');
        Route::post('/settings', 'Admin\Index\SettingController@update')->name('admin.setting.update');
    });
});

//Route::get('/login', function () {
//    return view('auth.login');
//});

Route::group(['middleware' => 'init', ], function () {
    Route::get('/', 'Home\Blog\ArticleController@index');
    Route::get('/friend-links', 'Home\Index\LinkController@index')->name('home.blog.link.friend');
    Route::get('/{slug}', 'Home\Blog\ArticleController@show')->name('home.blog.article');
    Route::get('/category/{category}', 'Home\Blog\CategoryController@show')->name('home.blog.category.show');
    Route::get('/tag/{tag}', 'Home\Blog\TagController@show')->name('home.blog.tag.show');
});