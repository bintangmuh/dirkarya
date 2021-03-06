<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    $karyas = App\Karya::all();
    return view('welcome', ['karyas' => $karyas]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home2', 'HomeController@index');
Route::get('/karya', 'KaryaController@index');
Route::get('/profile', 'UserController@viewProfile')->name('profile')->middleware('auth');
Route::get('/profile/edit', 'UserController@editViewProfile')->name('profileeditview')->middleware('auth');
Route::post('/profile/edit/data', 'UserController@editProfile')->name('profilepostdata')->middleware('auth');
Route::get('/profile/{id}', 'UserController@viewUserProfile')->name('profileUser');

Route::get('/karya/new', 'KaryaController@createView')->name('buatkaryabaru')->middleware('auth');
Route::post('/karya/new', 'KaryaController@postCreate')->name('postkaryabaru')->middleware('auth');
Route::get('/karya/{id}/edit', 'KaryaController@edit')->name('karyaeditview')->middleware('auth');
Route::post('/karya/{id}/edit', 'KaryaController@postEdit')->name('karyaeditpost')->middleware('auth');

Route::get('/karya/{id}/addimages', 'GalleryController@viewUploader')->name('addimage')->middleware('auth', 'can:update,id');
Route::post('/karya/{id}/addimages', 'GalleryController@multiupload')->name('addimagepost')->middleware('auth');
Route::post('/karya/{id}/addvideo', 'GalleryController@videoEmbed')->name('videoembedpost')->middleware('auth');
Route::get('/karya/{id}/addvideo/{video}/delete', 'GalleryController@videoDelete')->name('videodelete')->middleware('auth', 'can:update,id');

Route::get('/karya/{postid}/deleteimages/{id}', 'GalleryController@removeimage')->name('deleteimage')->middleware('auth');

Route::post('/search','SearchController@search')->name('search');
Route::get('/search','SearchController@explore')->name('explore');

Route::get('/karya/{id}', 'KaryaController@show')->name('karya');
