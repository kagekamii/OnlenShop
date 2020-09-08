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
Route::get('/about', 'ShopController@about');

//----------------------ROUTE LOGOUT------------------
Route::get('/logout', 'ShopController@logout');

//--------------------ROUTE KATEGORI------------------
Route::get('/kategori-komputer', 'ShopController@komputer');
Route::get('/kategori-handphone', 'ShopController@handphone');
Route::get('/kategori-makanminum', 'ShopController@makanminum');

//----------------ROUTE BARANG---------------------
Route::get('/kategori-item/{id}', 'ShopController@kategoriesItem');
// Route::get('/kategori-komputer/item/{id}', 'ShopController@komputerItem');
// Route::get('/kategori-handphone/item/{id}', 'ShopController@handphoneItem');
// Route::get('/kategori-makanminum/item/{id}', 'ShopController@makanminumItem');

//----------------ROUTE KERANJANG----------------------
Route::post('/keranjang-satu', 'ShopController@keranjangSatu');
Route::get('/keranjang-satuhalf', 'ShopController@keranjangSatuHalf');
Route::get('/keranjang-dua', 'ShopController@keranjangDua');
Route::get('/insertData', 'ShopController@insertData');
Route::post('/insertData2', 'ShopController@insertData2');
Route::get('/keranjang-tiga', 'ShopController@keranjangTiga');

//--------------ROUTE SEARCH-------------
Route::get('/pencarian-item', 'ShopController@pencarianItem');

//-------------ROUTE TRANSAKSI------------
Route::get('/transaksi', 'ShopController@transaksi');
Route::get('/transaksi2', 'ShopController@transaksi2');
Route::get('/transaksi-detail/{id}', 'ShopController@transaksiDetail');
