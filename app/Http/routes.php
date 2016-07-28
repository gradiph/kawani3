<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');
Route::get('home', 'MainController@home');
Route::get('login', 'MainController@login');
Route::get('logout','MainController@logout');
Route::post('login/proses','MainController@prosesLogin');

Route::group(['prefix' => 'barang'], function() {
	Route::get('/','BarangController@lihat');
	Route::get('add','BarangController@tambah');
	Route::get('{id}/delete','BarangController@hapus');
	Route::get('{id}/edit','BarangController@ubah');
	Route::post('add/proses','BarangController@prosesTambah');
	Route::post('{id}/delete/proses','BarangController@prosesHapus');
	Route::post('{id}/edit/proses','BarangController@prosesUbah');
});

Route::group(['prefix' => 'diskon'], function() {
	Route::get('/','DiskonController@lihat');
	Route::get('add','DiskonController@tambah');
	Route::get('{id}/delete','DiskonController@hapus');
	Route::get('{id}/edit','DiskonController@ubah');
	Route::post('add/proses','DiskonController@prosesTambah');
	Route::post('{id}/delete/proses','DiskonController@prosesHapus');
	Route::post('{id}/edit/proses','DiskonController@prosesUbah');
});

Route::group(['prefix' => 'kasir'], function() {
	Route::get('/','KasirController@lihat');
	Route::get('add','KasirController@tambah');
	Route::get('{id}/delete','KasirController@hapus');
	Route::get('{id}/edit','KasirController@ubah');
	Route::post('add/proses','KasirController@prosesTambah');
	Route::post('{id}/delete/proses','KasirController@prosesHapus');
	Route::post('{id}/edit/proses','KasirController@prosesUbah');
});

Route::group(['prefix' => 'transaksi'], function() {
	Route::get('/','TransaksiController@lihat');
	Route::get('add','TransaksiController@tambah');
	Route::get('{id}/delete','TransaksiController@hapus');
	Route::get('{id}/edit','TransaksiController@ubah');
	Route::post('add/proses','TransaksiController@prosesTambah');
	Route::post('{id}/delete/proses','TransaksiController@prosesHapus');
	Route::post('{id}/edit/proses','TransaksiController@prosesUbah');
});

Route::group(['prefix' => 'cabang'], function() {
	Route::get('/','TokoController@lihat');
	Route::get('add','TokoController@tambah');
	Route::get('{id}/delete','TokoController@hapus');
	Route::get('{id}/edit','TokoController@ubah');
	Route::post('add/proses','TokoController@prosesTambah');
	Route::post('{id}/delete/proses','TokoController@prosesHapus');
	Route::post('{id}/edit/proses','TokoController@prosesUbah');
});

Route::group(['prefix' => 'supplier'], function() {
	Route::get('/','SupplierController@lihat');
	Route::get('add','SupplierController@tambah');
	Route::get('{id}/delete','SupplierController@hapus');
	Route::get('{id}/edit','SupplierController@ubah');
	Route::post('add/proses','SupplierController@prosesTambah');
	Route::post('{id}/delete/proses','SupplierController@prosesHapus');
	Route::post('{id}/edit/proses','SupplierController@prosesUbah');
});

Route::group(['prefix' => 'jenis'], function() {
	Route::get('/','JenisController@lihat');
	Route::get('add','JenisController@tambah');
	Route::get('{id}/delete','JenisController@hapus');
	Route::get('{id}/edit','JenisController@ubah');
	Route::post('add/proses','JenisController@prosesTambah');
	Route::post('{id}/delete/proses','JenisController@prosesHapus');
	Route::post('{id}/edit/proses','JenisController@prosesUbah');
});

Route::group(['prefix' => 'user'], function() {
	Route::get('/','UserController@lihat');
	Route::get('add','UserController@tambah');
	Route::get('{id}/delete','UserController@hapus');
	Route::get('{id}/edit','UserController@ubah');
	Route::get('{id}/password','UserController@ubahPass');
	Route::post('add/proses','UserController@prosesTambah');
	Route::post('{id}/delete/proses','UserController@prosesHapus');
	Route::post('{id}/edit/proses','UserController@prosesUbah');
	Route::post('{id}/password/proses','UserController@prosesUbahPass');
});