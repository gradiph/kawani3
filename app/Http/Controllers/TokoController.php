<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use DB;
use Input;
use Redirect;
use Auth;
use Kawani\Toko;

class TokoController extends Controller
{
    public function lihat() 
	{
		$data = Toko::all();
		return view('toko.lihat')->with('tokos',$data);
	}
	public function tambah() 
	{
		return view('toko.tambah');
	}
	public function hapus($id) 
	{
		$data = Toko::find($id);
		return view('toko.hapus')->with('tokos',$data);
	}
    public function ubah($id) 
	{
		$data = Toko::find($id);
		return view('toko.ubah')->with('tokos',$data);
	}
    public function prosesTambah(ValidasiTokoTambah $validasi) 
	{
		Toko::create([
			'username' => Input::get('username'),
			'nama' => Input::get('nama'),
			'password' => bcrypt(Input::get('password')),
			'level' => Input::get('level'),
		]);
		return Redirect::to('cabang')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiTokoEdit $validasi) 
	{
		$data = Toko::find(Input::get('id'));
		$data->username = Input::get('username');
		$data->nama = Input::get('nama');
		$data->level = Input::get('level');
		$data->save();
		return Redirect::to('cabang')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Toko::destroy(Input::get('id'));
		return Redirect::to('cabang')->with('message','berhasil menghapus data');
	}
}
