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

Route::group(['prefix' => 'admin'], function (){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('callbacks', 'HomeController@callbackPage')->name('home.callbacks');
    Route::post('import', 'HomeController@import')->name('home.import.action');
    Route::get('manufacturer-charge', 'HomeController@manufacturerCharge')->name('home.manufacturer-charge');
    Route::get('user-activity', 'HomeController@userActivity')->name('home.user-activity');
});

Route::name('client.')->group(function (){
    Route::get('/', 'Client\ClientController@index')->name('index');
    Route::get('/about', 'Client\ClientController@about')->name('about');
    Route::get('/contact', 'Client\ClientController@contact')->name('contact');

    Route::get('/automotive/{id}', 'Client\ProductController@show')->name('product.show');

    Route::get('/filter', 'Client\ProductController@getFilteredProducts')->name('filter');
    Route::get('/search', 'Client\ProductController@getSearchedProducts')->name('search');

    Route::group(['prefix' => 'checkout'], function () {
        Route::get('/', 'Client\CheckoutController@checkout')->name('checkout');
        Route::post('/', 'Client\CheckoutController@store')->name('checkout.order');
    });

});

Route::group(['prefix' => 'ajax'], function (){
    Route::get('get-models', 'Client\ClientController@getModels');
    Route::get('get-types', 'Client\ClientController@getTypes');
    Route::get('add-to-cart', 'Client\CartController@update');
    Route::get('add-callback', 'Client\ClientController@addCallback');
});
