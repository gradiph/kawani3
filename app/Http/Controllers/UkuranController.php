<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiUkuranTambah;
use Kawani\Http\Requests\ValidasiUkuranUbah;
use Input;
use Redirect;
use Auth;
use Kawani\Ukuran;

class UkuranController extends Controller
{
    public function lihat() 
	{
		$data = Ukuran::all();
		return view('ukuran.lihat')->with('ukurans',$data);
	}
	public function tambah() 
	{
		return view('ukuran.tambah');
	}
	public function hapus($id) 
	{
		$data = Ukuran::find($id);
		return view('ukuran.hapus')->with('ukuran',$data);
	}
    public function ubah($id) 
	{
		$data = Ukuran::find($id);
		return view('ukuran.ubah')->with('ukuran',$data);
	}
    public function prosesTambah(ValidasiUkuranTambah $validasi) 
	{
		Ukuran::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
		]);
		return Redirect::to('ukuran')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiUkuranUbah $validasi) 
	{
		$data = Ukuran::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->save();
		return Redirect::to('ukuran')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Ukuran::destroy(Input::get('id'));
		return Redirect::to('ukuran')->with('message','berhasil menghapus data');
	}
}
