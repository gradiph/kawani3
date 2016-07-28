<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiJenisTambah;
use Kawani\Http\Requests\ValidasiJenisUbah;
use Input;
use Redirect;
use Auth;
use Kawani\Jenis;

class JenisController extends Controller
{
    public function lihat() 
	{
		$data = Jenis::all();
		$total = Jenis::count();
		return view('jenis.lihat')->with('jeniss',$data)->with('total',$total);
	}
	public function tambah() 
	{
		return view('jenis.tambah');
	}
	public function hapus($id) 
	{
		$data = Jenis::find($id);
		return view('jenis.hapus')->with('jenis',$data);
	}
    public function ubah($id) 
	{
		$data = Jenis::find($id);
		return view('jenis.ubah')->with('jenis',$data);
	}
    public function prosesTambah(ValidasiJenisTambah $validasi) 
	{
		Jenis::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
		]);
		return Redirect::to('jenis')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiJenisUbah $validasi) 
	{
		$data = Jenis::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->save();
		return Redirect::to('jenis')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Jenis::destroy(Input::get('id'));
		return Redirect::to('jenis')->with('message','berhasil menghapus data');
	}
}
