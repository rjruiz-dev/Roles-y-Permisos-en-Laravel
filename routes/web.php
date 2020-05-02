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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rutas

Route::middleware(['auth'])->group(function(){

// Roles(se trabaja con permisos)
    Route::resource('roles', 'RoleController'); 

// Productos(se trabaja con permisos)
// ruta de creacion
    Route::post('products/store', 'ProductController@store')->name('products.store')
        ->middleware('permission:products.create');
// ruta de visualizacion de listado
    Route::get('products', 'ProductController@index')->name('products.index')
    ->middleware('permission:products.index');
// ruta de formulario de creacion
    Route::get('products/create', 'ProductController@create')->name('products.create')
    ->middleware('permission:products.create');
// ruta de actualizacion
    Route::put('products/{product}', 'ProductController@update')->name('products.update')
    ->middleware('permission:products.edit');
// ruta del detalle
    Route::get('products/{product}', 'ProductController@show')->name('products.show')
    ->middleware('permission:products.show');
// ruta de eliminacion
    Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
    ->middleware('permission:products.destroy');
// ruta del formulario de edicion
    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
    ->middleware('permission:products.edit');
    
// Usuarios(se trabaja con permisos)
// ruta de visualizacion de listado
    Route::get('users', 'UserController@index')->name('users.index')
    ->middleware('permission:users.index');
// ruta de actualizacion
    Route::put('users/{user}', 'UserController@update')->name('users.update')
    ->middleware('permission:users.edit');
// ruta del detalle
    Route::get('users/{user}', 'UserController@show')->name('users.show')
    ->middleware('permission:users.show');
// ruta de eliminacion
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
    ->middleware('permission:users.destroy');
// ruta del formulario de edicion
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
    ->middleware('permission:users.edit');
});

