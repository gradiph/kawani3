<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiStokTambah;
use Kawani\Http\Requests\ValidasiStokUbah;
use Auth;
use Input;
use Redirect;
use Kawani\Stok;
use Kawani\Toko;
use Kawani\Barang;
use Kawani\Supplier;
use Kawani\Jenis;
use Kawani\Ukuran;
use Kawani\Warna;

class StokController extends Controller
{
    public function lihat() 
	{
		$data = Stok::orderBy('barang_id','asc')->orderBy('toko_id','asc')->get();
		$tokos = Toko::orderBy('nama','asc')->get();
		$total = Stok::count();
		return view('stok.lihat')->with('stoks',$data)->with('total',$total)->with('tokos',$tokos);
	}
	public function tambah($id)
	{
		$toko = Toko::find($id);
		$suppliers = Supplier::orderBy('nama','asc')->get();
		$jeniss = Jenis::orderBy('nama','asc')->get();
		$ukurans = Ukuran::all();
		$warnas = Warna::orderBy('nama','asc')->get();
		return view('stok.tambah')
				->with('toko',$toko)
				->with('suppliers',$suppliers)
				->with('jeniss',$jeniss)
				->with('ukurans',$ukurans)
				->with('warnas',$warnas);
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
		$stok = Stok::find($id);
		return view('stok.ubah')->with('stok',$stok);
	}
    public function prosesTambah(ValidasiStokTambah $validasi) 
	{
		Stok::create([
			'toko_id' => Input::get('toko_id'),
			'barang_id' => Input::get('barang_id'),
			'qty' => Input::get('qty'),
		]);
		return Redirect::to('stok')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiStokUbah $validasi)
	{
		$data = Stok::find(Input::get('stok_id'));
		$data->qty = Input::get('qty');
		$data->save();
		return Redirect::to('stok')->with('message','berhasil mengedit data');
	}
	public function prosesHapus() 
	{
		Stok::destroy(Input::get('stok_id'));
		return Redirect::to('stok')->with('message','berhasil menghapus data');
	}
    public function list($supplier_id,$jenis_id,$ukuran_id,$warna_id)
    {
        $barangs = Barang::where("supplier_id",'=',$supplier_id)
                ->where("jenis_id",'=',$jenis_id)
                ->where("ukuran_id",'=',$ukuran_id)
                ->where("warna_id",'=',$warna_id)
                ->get();
        return view('stok.list_barang')->with('barangs',$barangs);
    }
    public function data($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }
}
