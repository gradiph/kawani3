<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiStokTambah;
use Kawani\Http\Requests\ValidasiStokEdit;
use Auth;
use Input;
use Redirect;
use Kawani\Stok;
use Kawani\Toko;
use Kawani\Barang;

class StokController extends Controller
{
    public function lihat() 
	{
		$data = Stok::orderBy('barang_id','asc')->orderBy('toko_id','asc')->get();
		$tokos = Toko::orderBy('nama','asc')->get();
		$total = Stok::count();
		return view('stok.lihat')->with('stoks',$data)->with('total',$total)->with('tokos',$tokos);
	}
	public function tambah() 
	{
		return view('stok.tambah');
	}
	public function hapus($id) 
	{
		$data = Stok::find($id);
		$supplier = Supplier::orderBy('nama','asc')->get();
		$jenis = Jenis::orderBy('nama','asc')->get();
		$ukuran = Ukuran::all();
		$warna = Warna::orderBy('nama','asc')->get();
		return view('stok.hapus')
				->with('stok',$data)
				->with('suppliers',$supplier)
				->with('jeniss',$jenis)
				->with('ukurans',$ukuran)
				->with('warnas',$warna);
	}
    public function ubah($id) 
	{
		$data = Stok::find($id);
		$supplier = Supplier::orderBy('nama','asc')->get();
		$jenis = Jenis::orderBy('nama','asc')->get();
		$ukuran = Ukuran::all();
		$warna = Warna::orderBy('nama','asc')->get();
		return view('stok.ubah')
				->with('stok',$data)
				->with('suppliers',$supplier)
				->with('jeniss',$jenis)
				->with('ukurans',$ukuran)
				->with('warnas',$warna);
	}
    public function prosesTambah(ValidasiStokTambah $validasi) 
	{
		Stok::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
			'harga_jual' => Input::get('harga_jual'),
			'hpp' => Input::get('hpp'),
			'supplier_id' => Input::get('supplier_id'),
			'jenis_id' => Input::get('jenis_id'),
			'ukuran_id' => Input::get('ukuran_id'),
			'warna_id' => Input::get('warna_id'),
		]);
		return Redirect::to('stok')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiStokEdit $validasi) 
	{
		$data = Stok::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->harga_jual = Input::get('harga_jual');
		$data->hpp = Input::get('hpp');
		$data->save();
		return Redirect::to('stok')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Stok::destroy(Input::get('id'));
		return Redirect::to('stok')->with('message','berhasil menghapus data');
	}
}
