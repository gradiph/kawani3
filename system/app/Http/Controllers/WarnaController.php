<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiWarnaTambah;
use Kawani\Http\Requests\ValidasiWarnaUbah;
use Kawani\Warna;
use Auth;
use Input;
use Redirect;
use Session;

class WarnaController extends Controller
{
    public function lihat()
	{
		return view('warna.lihat');
	}
    public function list()
    {
        Session::put('warna_nama', Input::has('nama') ? Input::get('search') : (Session::has('warna_nama') ? Session::get('warna_nama') : ''));
        Session::put('warna_field', Input::has('field') ? Input::get('field') : (Session::has('warna_field') ? Session::get('warna_field') : 'nama'));
        Session::put('warna_sort', Input::has('sort') ? Input::get('sort') : (Session::has('warna_sort') ? Session::get('warna_sort') : 'asc'));

        $warnas = Warna::where('nama','LIKE','%'.Session::get('warna_nama').'%')
            ->orderBy(Session::get('warna_field'), Session::get('warna_sort'))
            ->paginate(8);
        return view('warna.list')
            ->with([
                'warnas'=>$warnas,
            ]);
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
