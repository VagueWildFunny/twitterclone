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

Route::get('/', 'UserController@index');

Auth::routes();
Route::resource('profile', 'UserController');
Route::get('/index', 'UserController@index')->name('index');
Route::get('/profile', 'UserController@profile')->middleware('auth');
Route::post('/profile', 'UserController@update_avatar');
Route::get('/home', 'HomeController@index')->name('home');
