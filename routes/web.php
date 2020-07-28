<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false
]);

Route::group(['prefix' => 'admin'], function (){
    Route::get('home', 'Admin\HomeController@index')->name('home');
    Route::get('callbacks', 'Admin\HomeController@callbackPage')->name('home.callbacks');
    Route::get('autopro', 'Admin\HomeController@exportForAutopro')->name('home.autopro');
    Route::get('download-autopro', 'Admin\HomeController@downloadAutoproCatalog')->name('home.download-autopro');
    Route::post('import', 'Admin\HomeController@import')->name('home.import.action');
    Route::get('manufacturer-charge', 'Admin\HomeController@manufacturerCharge')->name('home.manufacturer-charge');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('models', 'Admin\ModelController');

    Route::post('confirm-callback-request', 'Admin\HomeController@confirmCallback');
});

Route::name('new-client.')->group(function (){
    Route::get('', 'Client\PagesController@index')->name('landing');
    Route::get('contact', 'Client\PagesController@contacts')->name('contacts');
    Route::get('about-us', 'Client\PagesController@about')->name('about-us');
    Route::get('catalog', 'Client\PagesController@catalog')->name('catalog');

    Route::group(['prefix' => 'checkout'], function () {
        Route::get('/', 'Client\CheckoutController@checkout')->name('checkout');
        Route::post('/', 'Client\CheckoutController@store')->name('checkout.order');
        Route::get('/remove-from-order/{id}', 'Client\CheckoutController@removeFromCart')->name('checkout.removeFromCart');
    });

    Route::get('/automotive/{id}', 'Client\PagesController@show')->name('product.show');

    Route::get('/filter', 'Client\PagesController@getFilteredProducts')->name('filter');
    Route::get('/search', 'Client\PagesController@getSearchedProducts')->name('search');
});

Route::group(['prefix' => 'ajax'], function (){
    Route::get('get-models', 'Client\ClientController@getModels');
    Route::get('get-types', 'Client\ClientController@getTypes');
    Route::get('add-to-cart', 'Client\CartController@update');
    Route::get('add-callback', 'Client\ClientController@addCallback');
    Route::get('update-cart-quantity', 'Client\CartController@updateQuantity');
});

Route::get('sitemap.xml', 'Client\SitemapController@index');
