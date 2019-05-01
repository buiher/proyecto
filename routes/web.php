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

Route::get('inicio', 'controladorPagina@inicio');

Route::get('POST/login', 'controladorPagina@postLogin');

Route::get('POST/users/', 'controladorPagina@postUser')->middleware('autenticar');

Route::get('PUT/users/{id?}','controladorPagina@putUserid')->where ('id', '[0-9]+')->middleware('autenticar');

Route::get('DELETE/users/{id?}', 'controladorPagina@deleteUserid')->where ('id', '[0-9]+')->middleware('autenticar');
   
Route::get('GET/users/{id?}', 'controladorPagina@getUserid')->where ('id', '[0-9]+')->middleware('autenticar');


