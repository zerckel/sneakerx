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

Route::get('/', 'indexController@index');
Route::get('/contact/', 'contactController@index');
Route::get('/brands/', 'catalogController@index');
Route::get('/brands/{id}', 'catalogController@brandsId');
Route::get('/search/{search}', 'SearchController@index');
Route::get('/product/{id}', 'productsheet@index');
Route::get('/news/', 'newssheet@indexList');
Route::get('/news/{id}', 'newssheet@index');

Route::prefix('tool')->group(function () {
    Route::get('addToBasket', 'toolBox@addToBasket' );
});

Route::post('/sendmail/', 'mailController@index');

Auth::routes();

Route::get('/admin', 'adminController@index')->name('admin');
