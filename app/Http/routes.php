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
	Route::get('delete/{id}','BarangController@hapus');
	Route::get('edit/{id}','BarangController@ubah');
	Route::post('add/proses','BarangController@prosesTambah');
	Route::post('delete/{id}/proses','BarangController@prosesHapus');
	Route::post('edit/{id}/proses','BarangController@prosesUbah');
});

Route::group(['prefix' => 'diskon'], function() {
	Route::get('/','DiskonController@lihat');
	Route::get('add','DiskonController@tambah');
	Route::get('delete/{id}','DiskonController@hapus');
	Route::get('edit/{id}','DiskonController@ubah');
	Route::post('add/proses','DiskonController@prosesTambah');
	Route::post('delete/{id}/proses','DiskonController@prosesHapus');
	Route::post('edit/{id}/proses','DiskonController@prosesUbah');
});

Route::group(['prefix' => 'kasir'], function() {
	Route::get('/','KasirController@lihat');
	Route::get('add','KasirController@tambah');
	Route::get('delete/{id}','KasirController@hapus');
	Route::get('edit/{id}','KasirController@ubah');
	Route::post('add/proses','KasirController@prosesTambah');
	Route::post('delete/{id}/proses','KasirController@prosesHapus');
	Route::post('edit/{id}/proses','KasirController@prosesUbah');
});

Route::group(['prefix' => 'transaksi'], function() {
	Route::get('/','TransaksiController@lihat');
	Route::get('add','TransaksiController@tambah');
	Route::get('delete/{id}','TransaksiController@hapus');
	Route::get('edit/{id}','TransaksiController@ubah');
	Route::post('add/proses','TransaksiController@prosesTambah');
	Route::post('delete/{id}/proses','TransaksiController@prosesHapus');
	Route::post('edit/{id}/proses','TransaksiController@prosesUbah');
});

Route::group(['prefix' => 'user'], function() {
	Route::get('/','UserController@lihat');
	Route::get('add','UserController@tambah');
	Route::get('delete/{id}','UserController@hapus');
	Route::get('edit/{id}','UserController@ubah');
	Route::post('add/proses','UserController@prosesTambah');
	Route::post('delete/{id}/proses','UserController@prosesHapus');
	Route::post('edit/{id}/proses','UserController@prosesUbah');
});