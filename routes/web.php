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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ClientController@index')->name('client.index');
Route::get('/about', 'ClientController@about')->name('client.about');
Route::get('/contact', 'ClientController@contact')->name('client.contact');
Route::get('/1', 'ClientController@item')->name('client.item');
