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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){
    Route::get('/products', 'ProductController@index'); //listado
    Route::get('/products/create', 'ProductController@create'); //formulario
    Route::post('/products', 'ProductController@store'); //crear

    Route::get('/products/{id}/edit', 'ProductController@edit'); //formulario edicion
    Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
    Route::post('/products/{id}/delete', 'ProductController@destroy'); //eliminar

    Route::get('/products/{id}/images', 'ImageController@index'); //listado imgns
    Route::post('/products/{id}/save_image', 'ImageController@store')->name('products.save_image'); //registrar
    Route::post('/products/{id}/images', 'ImageController@destroy'); //eliminar

});
