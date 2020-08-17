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

Route::get('/home', 'ShopController@index');
Route::post('/home/daftar', 'ShopController@daftar');
Route::post('/home/login', 'ShopController@login');
// route baru buat logout
Route::get('/logout', 'ShopController@logout');
// Route::post('/home/ajax_profil_user', 'ShopController@login');
