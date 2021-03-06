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

Route::get('/', 'BasicAuthController@loginForm');
Route::post('/', 'BasicAuthController@actionLogin');

Route::get('song/random', ['as' => 'song.random', 'uses' => 'SongController@random']);

Route::resource('song', 'SongController');

Route::get('song/{song}/delete', ['as' => 'song.delete', 'uses' => 'SongController@destroy']);

Route::get('song/{song}/rating', ['as'=>'song.rating.edit', 'uses'=>'SongController@editRating']);
Route::post('song/{song}/rating', ['as'=>'song.rating.update', 'uses'=>'SongController@updateRating']);


// API
Route::any('api/v1/song', ['as' => 'api.v1.song', 'uses' => 'SongApiController@songCommand']);
