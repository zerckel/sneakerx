<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware('cors')->group(function () {

    Route::get('/', 'indexController@index');
    Route::get('/basket/', 'basketController@index');
    Route::get('/contact/', 'contactController@index');
    Route::get('/brands/', 'catalogController@index');
    Route::get('/brands/{id}', 'catalogController@brandsId');
    Route::get('/search/{search}', 'SearchController@index');
    Route::get('/product/{id}', 'productsheet@index');
    Route::get('/news/', 'newssheet@indexList');
    Route::get('/news/{id}', 'newssheet@index');

    Route::prefix('tool')->group(function () {
        Route::get('addToBasket', 'toolBox@addToBasket');
    });

    Route::post('/sendmail/', 'mailController@index');
    Route::post('/confirmation/', 'confirmation@index');
    Route::get('/confirmation/', 'confirmation@finalPage');

    Auth::routes();

    Route::prefix('admin')->group(function () {
        Route::get('/', 'administratorController@index')->name('admin');


        Route::middleware('auth')->group(function () {
            Route::get('/logout', 'administratorController@logout');

            Route::delete('/products/{id}', 'administratorController@deleteProducts');
            Route::delete('/news/{id}', 'administratorController@deleteNews');
            Route::delete('/brands/{id}', 'administratorController@deleteBrands');

            Route::get('/brands', 'administratorController@brands');
            Route::get('/products', 'administratorController@products');
            Route::get('/news', 'administratorController@news');
            Route::get('/brands/add', 'brandsController@index');
            Route::get('/products/add', 'productsController@index');
            Route::get('/news/add', 'newsController@index');

            Route::post('/brands/add', 'brandsController@addBrand');
            Route::post('/products/add', 'productsController@addProduct');
            Route::post('/news/add', 'newsController@addNews');

            Route::get('/brands/{id}', 'brandsController@update');
            Route::get('/products/{id}', 'productsController@update');
            Route::get('/news/{id}', 'newsController@update');

            Route::put('/brands/{id}', 'brandsController@updateBrand');
            Route::put('/products/{id}', 'productsController@updateProduct');
            Route::put('/news/{id}', 'newsController@updateNews');
        });
    });
});
