<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiBarangTambah;
use Kawani\Http\Requests\ValidasiBarangEdit;
use Auth;
use Input;
use Redirect;
use Kawani\Barang;
use Kawani\Supplier;
use Kawani\Jenis;
use Kawani\Ukuran;
use Kawani\Warna;

class BarangController extends Controller
{
	public function lihat() 
	{
		$data = Barang::paginate(25);
		return view('barang.lihat')->with('barangs',$data);
	}
	public function tambah() 
	{
		$supplier = Supplier::orderBy('nama','asc')->get();
		$jenis = Jenis::orderBy('nama','asc')->get();
		$ukuran = Ukuran::all();
		$warna = Warna::orderBy('nama','asc')->get();
		return view('barang.tambah')
				->with('suppliers',$supplier)
				->with('jeniss',$jenis)
				->with('ukurans',$ukuran)
				->with('warnas',$warna);
	}
	public function hapus($id) 
	{
		$data = Barang::find($id);
		$supplier = Supplier::orderBy('nama','asc')->get();
		$jenis = Jenis::orderBy('nama','asc')->get();
		$ukuran = Ukuran::all();
		$warna = Warna::orderBy('nama','asc')->get();
		return view('barang.hapus')
				->with('barang',$data)
				->with('suppliers',$supplier)
				->with('jeniss',$jenis)
				->with('ukurans',$ukuran)
				->with('warnas',$warna);
	}
    public function ubah($id) 
	{
		$data = Barang::find($id);
		$supplier = Supplier::orderBy('nama','asc')->get();
		$jenis = Jenis::orderBy('nama','asc')->get();
		$ukuran = Ukuran::all();
		$warna = Warna::orderBy('nama','asc')->get();
		return view('barang.ubah')
				->with('barang',$data)
				->with('suppliers',$supplier)
				->with('jeniss',$jenis)
				->with('ukurans',$ukuran)
				->with('warnas',$warna);
	}
    public function prosesTambah(ValidasiBarangTambah $validasi) 
	{
		Barang::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
			'harga_jual' => Input::get('harga_jual'),
			'hpp' => Input::get('hpp'),
			'supplier_id' => Input::get('supplier_id'),
			'jenis_id' => Input::get('jenis_id'),
			'ukuran_id' => Input::get('ukuran_id'),
			'warna_id' => Input::get('warna_id'),
		]);
		return Redirect::to('barang')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiBarangEdit $validasi) 
	{
		$data = Barang::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->harga_jual = Input::get('harga_jual');
		$data->hpp = Input::get('hpp');
		$data->save();
		return Redirect::to('barang')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Barang::destroy(Input::get('id'));
		return Redirect::to('barang')->with('message','berhasil menghapus data');
	}
}