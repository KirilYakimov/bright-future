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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'PostController@create');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'PostController@store')->name('post.store');

//For about
Route::get('/about', 'AboutController@index')->name('about');

//For contact
Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');

//For user edit  
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show')->middleware('verified');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
