<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiBarangTambah;
use Kawani\Http\Requests\ValidasiBarangUbah;
use Auth;
use Input;
use Redirect;
use Kawani\Barang;

class BarangController extends Controller
{
	public function lihat() 
	{
		$data = Barang::paginate(25);
		return view('barang.lihat')->with('barangs',$data);
	}
	public function tambah() 
	{
		return view('barang.tambah');
	}
	public function hapus($id) 
	{
		$data = Barang::find($id);
		return view('barang.hapus')->with('barang',$data);
	}
    public function ubah($id) 
	{
		$data = Barang::find($id);
		return view('barang.ubah')->with('barang',$data);
	}
    public function prosesTambah(ValidasiBarangTambah $validasi) 
	{
		Barang::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
		]);
		return Redirect::to('barang')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiBarangUbah $validasi) 
	{
		$data = Barang::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->save();
		return Redirect::to('barang')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Barang::destroy(Input::get('id'));
		return Redirect::to('barang')->with('message','berhasil menghapus data');
	}
}