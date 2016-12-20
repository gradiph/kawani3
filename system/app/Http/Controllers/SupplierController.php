<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiSupplierTambah;
use Kawani\Http\Requests\ValidasiSupplierUbah;
use Kawani\Supplier;
use Auth;
use Input;
use Redirect;
use Session;

class SupplierController extends Controller
{
    public function lihat()
	{
		return view('supplier.lihat');
	}
    public function list()
    {
        Session::put('supplier_nama', Input::has('nama') ? Input::get('search') : (Session::has('supplier_nama') ? Session::get('supplier_nama') : ''));
        Session::put('supplier_field', Input::has('field') ? Input::get('field') : (Session::has('supplier_field') ? Session::get('supplier_field') : 'nama'));
        Session::put('supplier_sort', Input::has('sort') ? Input::get('sort') : (Session::has('supplier_sort') ? Session::get('supplier_sort') : 'asc'));

        $suppliers = Supplier::where('nama','LIKE','%'.Session::get('supplier_nama').'%')
            ->orderBy(Session::get('supplier_field'), Session::get('supplier_sort'))
            ->paginate(8);
        return view('supplier.list')
            ->with([
                'suppliers'=>$suppliers,
            ]);
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
