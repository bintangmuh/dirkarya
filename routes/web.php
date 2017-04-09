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
use App\Karya as Karya;
Route::get('/', function () {
    $karyas = Karya::all();
    return view('welcome', ['karyas' => $karyas]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home2', 'HomeController@index');
Route::get('/karya', 'KaryaController@index');
Route::get('/profile', 'KaryaController@index')->name('profile');
Route::get('/profile/edit', 'UserController@editViewProfile')->name('profileeditview')->middleware('auth');
Route::post('/profile/edit/data', 'UserController@editProfile')->name('profilepostdata')->middleware('auth');

Route::get('/karya/new', 'KaryaController@createView')->name('buatkaryabaru')->middleware('auth');
Route::post('/karya/new', 'KaryaController@postCreate')->name('postkaryabaru')->middleware('auth');
Route::get('/karya/{id}/edit', 'KaryaController@edit')->name('karyaeditview')->middleware('auth');
Route::post('/karya/{id}/edit', 'KaryaController@postEdit')->name('karyaeditpost')->middleware('auth');


Route::get('/karya/{id}', 'KaryaController@show')->name('karya');
