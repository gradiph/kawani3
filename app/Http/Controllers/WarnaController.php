<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiWarnaTambah;
use Kawani\Http\Requests\ValidasiWarnaUbah;
use Input;
use Redirect;
use Auth;
use Kawani\Warna;

class WarnaController extends Controller
{
    public function lihat() 
	{
		$data = Warna::all();
		return view('warna.lihat')->with('warnas',$data);
	}
	public function tambah() 
	{
		return view('warna.tambah');
	}
	public function hapus($id) 
	{
		$data = Warna::find($id);
		return view('warna.hapus')->with('warna',$data);
	}
    public function ubah($id) 
	{
		$data = Warna::find($id);
		return view('warna.ubah')->with('warna',$data);
	}
    public function prosesTambah(ValidasiWarnaTambah $validasi) 
	{
		Warna::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
		]);
		return Redirect::to('warna')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiWarnaUbah $validasi) 
	{
		$data = Warna::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->save();
		return Redirect::to('warna')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Warna::destroy(Input::get('id'));
		return Redirect::to('warna')->with('message','berhasil menghapus data');
	}
}
