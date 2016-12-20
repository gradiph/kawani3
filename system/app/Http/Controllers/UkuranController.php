<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiUkuranTambah;
use Kawani\Http\Requests\ValidasiUkuranUbah;
use Kawani\Ukuran;
use Auth;
use Input;
use Redirect;
use Session;

class UkuranController extends Controller
{
    public function lihat()
	{
		return view('ukuran.lihat');
	}
    public function list()
    {
        Session::put('ukuran_nama', Input::has('nama') ? Input::get('search') : (Session::has('ukuran_nama') ? Session::get('ukuran_nama') : ''));
        Session::put('ukuran_field', Input::has('field') ? Input::get('field') : (Session::has('ukuran_field') ? Session::get('ukuran_field') : 'nama'));
        Session::put('ukuran_sort', Input::has('sort') ? Input::get('sort') : (Session::has('ukuran_sort') ? Session::get('ukuran_sort') : 'asc'));

        $ukurans = Ukuran::where('nama','LIKE','%'.Session::get('ukuran_nama').'%')
            ->orderBy(Session::get('ukuran_field'), Session::get('ukuran_sort'))
            ->paginate(8);
        return view('ukuran.list')
            ->with([
                'ukurans'=>$ukurans,
            ]);
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
