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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'AlbumsController@index')->name('index');
Route::get('/albums', 'AlbumsController@index')->name('albums');
Route::get('/albums/create', 'AlbumsController@create')->name('creates');
Route::get('/albums/{id}', 'AlbumsController@show')->name('show');
Route::get('/photos/create/{id}', 'PhotosController@create')->name('photos');
Route::get('/photos/{id}', 'PhotosController@show')->name('show');
Route::post('/albums/store', 'AlbumsController@store')->name('create');
Route::post('/photos/store', 'PhotosController@store')->name('store');
Route::delete('/photos/{id}', 'PhotosController@destroy')->name('delete');


