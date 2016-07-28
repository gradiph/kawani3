<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiSupplierTambah;
use Kawani\Http\Requests\ValidasiSupplierUbah;
use Input;
use Redirect;
use Auth;
use Kawani\Supplier;

class SupplierController extends Controller
{
    public function lihat() 
	{
		$data = Supplier::paginate(25);
		$total = Supplier::count();
		return view('supplier.lihat')->with('suppliers',$data)->with('total',$total);
	}
	public function tambah() 
	{
		return view('supplier.tambah');
	}
	public function hapus($id) 
	{
		$data = Supplier::find($id);
		return view('supplier.hapus')->with('supplier',$data);
	}
    public function ubah($id) 
	{
		$data = Supplier::find($id);
		return view('supplier.ubah')->with('supplier',$data);
	}
    public function prosesTambah(ValidasiSupplierTambah $validasi) 
	{
		Supplier::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
		]);
		return Redirect::to('supplier')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiSupplierUbah $validasi) 
	{
		$data = Supplier::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->save();
		return Redirect::to('supplier')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Supplier::destroy(Input::get('id'));
		return Redirect::to('supplier')->with('message','berhasil menghapus data');
	}
}
