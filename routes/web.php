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

Route::get('/', 'HomeController@index');
//Route::get('/', 'HomeController@index')->name('home');

//-------Trabajando sobre Movies -------
Route::get('/proximosEstrenos','MovieController@index');    
Route::get('/detallePelicula/{id}', 'MovieController@show');

Route::get('/incluirPelicula','MovieController@create');
Route::post('/savePelicula','MovieController@save');

Route::get('/buscar', 'MovieController@search')->name('busqueda');

Route::get('/pelicula/{id}/update', 'MovieController@edit');
Route::patch('/pelicula/{id}/update', 'MovieController@update');

Route::get('/eliminarPelicula/{id}','MovieController@destroy');

//Esta es la ruta que por defecto crea Laravel, en el momento que creamos el proyecto.
//Route::get('/', function () {
//    return view('welcome');
//});

//Esta rutra la crea Laravel automaticamente, en el momento que aplicamos en la consola el comando php artisan make:auth
Auth::routes();

//Esto es otra forma de llamar a una vista, es decir la invocamos desde la misma ruta inicial, esto se los explique en la primera clase virtual, veanla cuando puedan.
//Route::get('/logout', function () {
//    Auth::logout();
//});


