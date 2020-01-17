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

Route::get('admin/home', 'HomeController@import')->name('home');
Route::get('admin/callbacks', 'HomeController@callbackPage')->name('home.callbacks');
//Route::get('admin/import', 'HomeController@import')->name('home.import');
Route::get('admin/manufacturer-charge', 'HomeController@manufacturerCharge')->name('home.manufacturer-charge');
Route::get('admin/user-activity', 'HomeController@userActivity')->name('home.user-activity');

Route::get('/', 'Client\ClientController@index')->name('client.index');
Route::get('/about', 'Client\ClientController@about')->name('client.about');
Route::get('/contact', 'Client\ClientController@contact')->name('client.contact');

Route::get('automotive/{id}', 'Client\ProductController@show')->name('client.product.show');
