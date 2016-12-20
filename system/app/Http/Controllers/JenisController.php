<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiJenisTambah;
use Kawani\Http\Requests\ValidasiJenisUbah;
use Kawani\Jenis;
use Auth;
use Input;
use Redirect;
use Session;

class JenisController extends Controller
{
    public function lihat()
	{
		return view('jenis.lihat');
	}
    public function list()
    {
        Session::put('jenis_nama', Input::has('nama') ? Input::get('search') : (Session::has('jenis_nama') ? Session::get('jenis_nama') : ''));
        Session::put('jenis_field', Input::has('field') ? Input::get('field') : (Session::has('jenis_field') ? Session::get('jenis_field') : 'nama'));
        Session::put('jenis_sort', Input::has('sort') ? Input::get('sort') : (Session::has('jenis_sort') ? Session::get('jenis_sort') : 'asc'));

        $jeniss = Jenis::where('nama','LIKE','%'.Session::get('jenis_nama').'%')
            ->orderBy(Session::get('jenis_field'), Session::get('jenis_sort'))
            ->paginate(8);
        return view('jenis.list')
            ->with([
                'jeniss'=>$jeniss,
            ]);
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
