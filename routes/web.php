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
Route::get('/keranjang-tiga', 'ShopController@keranjangTiga');

//--------------ROUTE SEARCH-------------
Route::get('/pencarian-item', 'ShopController@pencarianItem');

//-------------ROUTE TRANSAKSI------------
Route::get('/transaksi', 'ShopController@transaksi');
Route::get('/transaksi2', 'ShopController@transaksi2');
Route::get('/transaksi-detail/{id}', 'ShopController@transaksiDetail');
Route::get('/transaksi-batal/{id}', 'ShopController@transaksiBatal');
Route::get('/transaksi-hapus/{id}', 'ShopController@transaksiHapus');
//-------------ROUTE CHATBOT------------
Route::get('/chat', 'ShopController@chat');

//----------------ENGLISH PAGE------------------ENGLISH PAGE--------------ENGLISH PAGE-----------
//-------------ROUTE HOME--------------
Route::get('/en-home', 'ShopController@enHome');
Route::post('/en-home/daftar', 'ShopController@enDaftar');
Route::post('/en-home/login', 'ShopController@enLogin');

//----------------------ROUTE LOGOUT------------------
Route::get('/en-logout', 'ShopController@enLogout');

//--------------------ROUTE KATEGORI------------------
Route::get('/en-kategori-komputer', 'ShopController@enKomputer');
Route::get('/en-kategori-handphone', 'ShopController@enHandphone');
Route::get('/en-kategori-makanminum', 'ShopController@enMakanminum');

//----------------ROUTE BARANG---------------------
Route::get('/en-kategori-item/{id}', 'ShopController@enKategoriesItem');

//----------------ROUTE KERANJANG----------------------
Route::post('/en-keranjang-satu', 'ShopController@enKeranjangSatu');
Route::get('/en-keranjang-satuhalf', 'ShopController@enKeranjangSatuHalf');
Route::get('/en-keranjang-dua', 'ShopController@enKeranjangDua');
Route::get('/en-insertData', 'ShopController@enInsertData');
Route::get('/en-keranjang-tiga', 'ShopController@enKeranjangTiga');

//-------------ROUTE TRANSAKSI------------
Route::get('/en-transaksi', 'ShopController@enTransaksi');
Route::get('/en-transaksi2', 'ShopController@enTransaksi2');
Route::get('/en-transaksi-detail/{id}', 'ShopController@enTransaksiDetail');
Route::get('/en-transaksi-batal/{id}', 'ShopController@enTransaksiBatal');
Route::get('/en-transaksi-hapus/{id}', 'ShopController@enTransaksiHapus');

//--------------ROUTE SEARCH-------------
Route::get('/en-pencarian-item', 'ShopController@enPencarianItem');
