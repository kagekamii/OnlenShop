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
// route kategori
Route::get('/kategori-komputer', 'ShopController@komputer');
Route::get('/kategori-handphone', 'ShopController@handphone');
Route::get('/kategori-makanminum', 'ShopController@makanminum');
// route barang
Route::get('/kategori-komputer/item/{id}', 'ShopController@komputerItem');
Route::get('/kategori-handphone/item/{id}', 'ShopController@handphoneItem');
Route::get('/kategori-makanminum/item/{id}', 'ShopController@makanminumItem');
// route keranjang
Route::post('/keranjang-satu', 'ShopController@keranjangSatu');
Route::get('/keranjang-satuhalf', 'ShopController@keranjangSatuHalf');
Route::get('/keranjang-dua', 'ShopController@keranjangDua');
Route::get('/insertData', 'ShopController@insertData');
Route::post('/insertData2', 'ShopController@insertData2');
Route::get('/keranjang-tiga', 'ShopController@keranjangTiga');

// Route::post('/home/ajax_profil_user', 'ShopController@login');
