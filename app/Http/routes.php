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
Route::get('/about',['uses'=>'IndexController@about', 'as' => 'pages.about']);
Route::get('/contact',['uses'=>'IndexController@contact', 'as' => 'pages.contact']);
Route::post('/contact',['uses'=>'IndexController@postContact', 'as' => 'pages.postContact']);
Route::get('/post/{slug}', 'IndexController@post')->name('pages.post');
Route::auth();

Route::get('/admin', 'HomeController@index');
//Posts
Route::resource('posts','PostController');
//categories
Route::resource('categories','CategoryController', ['except'=> ['create']]);
//tags
Route::resource('tags','TagController', ['except'=> ['create']]);
//comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as'=> 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as'=> 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as'=> 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as'=> 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as'=> 'comments.delete']);