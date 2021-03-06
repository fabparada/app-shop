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

Route::get('/search', 'SearchController@show'); //
Route::get('/products/json', 'SearchController@data'); //

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show'); //
Route::get('/categories/{category}', 'CategoryController@show'); //




Route::post('/cart', 'CartDetailController@store'); //
Route::post('/cart/delete', 'CartDetailController@destroy'); //

Route::post('/order', 'CartController@update'); //

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function (){
    Route::get('/products', 'ProductController@index'); //listado
    Route::get('/products/create', 'ProductController@create'); //formulario
    Route::post('/products', 'ProductController@store'); //crear

    Route::get('/products/{id}/edit', 'ProductController@edit'); //formulario edicion
    Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
    Route::post('/products/{id}/delete', 'ProductController@destroy'); //eliminar

    Route::get('/products/{id}/images', 'ImageController@index'); //listado imgns
    Route::post('/products/{id}/save_image', 'ImageController@store')->name('products.save_image'); //registrar
    Route::post('/products/{id}/images', 'ImageController@destroy'); //eliminar
    Route::GET('/products/{id}/images/select/{image}', 'ImageController@select'); //eliminar

    //catergorias
    Route::get('/categories', 'CategoryController@index'); //listado actegorias
    Route::get('/categories/create', 'CategoryController@create'); //formulario crear categorias
    Route::post('/categories', 'CategoryController@store'); //crear  nuevas categorias
    Route::get('/categories/{category}/edit', 'CategoryController@edit'); //formulario edicion categorias
    Route::post('/categories/{category}/edit', 'CategoryController@update'); //actualizar categoria 
    Route::post('/categories/{category}/delete', 'CategoryController@destroy'); //eliminar categoria

    //en vez de id pasado como parametro {id} pasare como parametro category hacia el controlador.

});
