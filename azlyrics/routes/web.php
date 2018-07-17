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
    return view('songs.index');
})->name('home');

Route::get('/search', 'SongController@search');
Route::get('/lyrics/{song}', 'SongController@show');


//Artist controller
Route::get('/artist/{artist}', 'ArtistController@show');
Route::get('/artist/edit/{id}', 'ArtistController@edit');
Route::patch('/artist/update/{id}', 'ArtistController@update');
Route::delete('/artist/delete/{id}', 'ArtistController@destroy') ;


// Admin controller
Route::get('/admin/request', 'AdminController@demand')->name('admin.request') ;
Route::post('/admin/request/{id}', 'AdminController@store') ;
Route::delete('/admin/delete/{id}', 'AdminController@destroy') ;
Route::get('/admin/create/{id}', 'AdminController@create') ;
Route::get('/admin/edit/{id}', 'AdminController@edit') ;
Route::patch('/admin/update/{id}', 'AdminController@update') ;


// Authentication
Auth::routes();

Route::resource('songs','SongController')->except('index') ;



