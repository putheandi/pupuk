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
    return redirect('login');
});

Route::group(['middleware' => 'auth'],function (){

    // Route::resource('barang', 'BarangController');
    Route::get('barang', 'BarangController@index')->name('barang.index');
    Route::get('barang/create', 'BarangController@create')->name('barang.create');
    Route::post('barang', 'BarangController@store')->name('barang.store');
    Route::get('barang/{barang}/edit', 'BarangController@edit')->name('barang.edit');
    Route::put('barang/{barang}', 'BarangController@update')->name('barang.update');
    Route::delete('barang/{barang}', 'BarangController@destroy')->name('barang.destroy');
    Route::get('barang/{barang}', 'BarangController@show')->name('barang.show');

    Route::get('stok/create/{id}', 'StokController@create')->name('stok.create');
    Route::post('stok/{id}', 'StokController@store')->name('stok.store');

    Route::get('penjualan', 'PenjualanController@index')->name('penjualan.index');
    Route::get('penjualan/create', 'PenjualanController@create')->name('penjualan.create');
    Route::post('penjualan', 'PenjualanController@store')->name('penjualan.store');

    Route::resource('jenisPaket', 'JenisPaketController');

    Route::resource('user', 'UserController');

//    Route::get('/home', 'HomeController@index')->name('home');

});
Auth::routes();
