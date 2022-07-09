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

Route::get('/', 'GuidelinesController@index');

Route::resource('guidelines', 'GuidelinesController');
Route::resource('tutorials', 'TutorialsController');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('guidelines', 'GuidelinesController', ['only' => ['store', 'destroy']]);
});

//検索
Route::get('posts', 'PostController@index')->name('posts.index');

Route::get('guidelines', 'GuidelinesController@summary')->name('guidelines.summary');
Route::get('tutorials', 'TutorialsController@summary')->name('tutorials.summary');

Route::get('pickup', 'PickupController@index')->name('pickup.index');

 Route::group(['prefix' => 'users/{id}'], function () {

        // users/{id}/followers
        Route::get('tutorials', 'UsersController@tutorials')->name('users.tutorials_show');

        // users/{id}/favorites
        Route::get('guidelines', 'UsersController@guidelines')->name('users.guidelines_show');
    });