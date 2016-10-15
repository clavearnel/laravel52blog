<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');
Route::get('/about', 'IndexController@about')->name('pages.about');
Route::get('/post/{post_id}', 'IndexController@post')->name('pages.post');
Route::auth();

Route::get('/admin', 'HomeController@index');
Route::resource('posts','PostController');