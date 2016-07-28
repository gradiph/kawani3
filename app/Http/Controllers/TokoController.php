<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiTokoTambah;
use Kawani\Http\Requests\ValidasiTokoUbah;
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
		return view('toko.hapus')->with('toko',$data);
	}
    public function ubah($id) 
	{
		$data = Toko::find($id);
		return view('toko.ubah')->with('toko',$data);
	}
    public function prosesTambah(ValidasiTokoTambah $validasi) 
	{
		Toko::create([
			'nama' => Input::get('nama'),
			'alamat' => Input::get('alamat'),
			'telepon' => Input::get('telepon'),
		]);
		return Redirect::to('cabang')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiTokoUbah $validasi) 
	{
		$data = Toko::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->alamat = Input::get('alamat');
		$data->telepon = Input::get('telepon');
		$data->save();
		return Redirect::to('cabang')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Toko::destroy(Input::get('id'));
		return Redirect::to('cabang')->with('message','berhasil menghapus data');
	}
}
