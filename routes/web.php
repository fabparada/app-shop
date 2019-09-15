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

Route::get('/admin/products', 'ProductController@index'); //listado
Route::get('/admin/products/create', 'ProductController@create'); //formulario
Route::post('/admin/products', 'ProductController@store'); //crear

Route::get('/admin/products/{id}/edit', 'ProductController@edit'); //formulario edicion
Route::post('/admin/products/{id}/edit', 'ProductController@update'); //actualizar
Route::post('/admin/products/{id}/delete', 'ProductController@destroy'); //eliminar
