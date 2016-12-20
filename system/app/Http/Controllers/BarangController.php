<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiBarangTambah;
use Kawani\Http\Requests\ValidasiBarangEdit;
use Kawani\Barang;
use Kawani\Supplier;
use Kawani\Jenis;
use Kawani\Ukuran;
use Kawani\Warna;
use Auth;
use Input;
use Redirect;
use Session;

class BarangController extends Controller
{
	public function lihat()
	{
        $suppliers = Supplier::orderBy('nama','asc')->get();
		$jeniss = Jenis::orderBy('nama','asc')->get();
		$ukurans = Ukuran::all();
		$warnas = Warna::orderBy('nama','asc')->get();

		return view('barang.lihat')
            ->with([
                'suppliers'=>$suppliers,
                'jeniss'=>$jeniss,
                'ukurans'=>$ukurans,
                'warnas'=>$warnas,
            ]);
	}
    public function list()
    {
        Session::put('barang_nama', Input::has('nama') ? Input::get('search') : (Session::has('barang_nama') ? Session::get('barang_nama') : ''));
        Session::put('barang_supplier', Input::has('supplier') ? Input::get('search') : (Session::has('barang_nama') ? Session::get('barang_supplier') : ''));
        Session::put('barang_jenis', Input::has('jenis') ? Input::get('search') : (Session::has('barang_jenis') ? Session::get('barang_jenis') : ''));
        Session::put('barang_ukuran', Input::has('ukuran') ? Input::get('search') : (Session::has('barang_ukuran') ? Session::get('barang_ukuran') : ''));
        Session::put('barang_warna', Input::has('warna') ? Input::get('search') : (Session::has('barang_warna') ? Session::get('barang_warna') : ''));

        $barangs = Barang::where('nama','LIKE','%'.Session::get('barang_nama').'%')
            ->where('supplier_id','LIKE','%'.Session::get('barang_supplier').'%')
            ->where('jenis_id','LIKE','%'.Session::get('barang_jenis').'%')
            ->where('ukuran_id','LIKE','%'.Session::get('barang_ukuran').'%')
            ->where('warna_id','LIKE','%'.Session::get('barang_warna').'%')
            ->orderBy('supplier_id', 'asc')
            ->orderBy('nama', 'asc')
            ->paginate(8);
        return view('barang.list')
            ->with([
                'barangs'=>$barangs,
            ]);
    }
    public function resetList()
    {
        Session::put('barang_nama', '');
        Session::put('barang_supplier', '');
        Session::put('barang_jenis', '');
        Session::put('barang_ukuran', '');
        Session::put('barang_warna', '');

        $barangs = Barang::where('nama','LIKE','%'.Session::get('barang_nama').'%')
            ->where('supplier_id','LIKE','%'.Session::get('barang_supplier').'%')
            ->where('jenis_id','LIKE','%'.Session::get('barang_jenis').'%')
            ->where('ukuran_id','LIKE','%'.Session::get('barang_ukuran').'%')
            ->where('warna_id','LIKE','%'.Session::get('barang_warna').'%')
            ->orderBy('supplier_id', 'asc')
            ->orderBy('nama', 'asc')
            ->paginate(8);
        return view('barang.list')
            ->with([
                'barangs'=>$barangs,
            ]);
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
		$barang = Barang::create([
			'id' => Input::get('id'),
			'nama' => Input::get('nama'),
			'harga_jual' => Input::get('harga_jual'),
			'hpp' => Input::get('hpp'),
			'supplier_id' => Input::get('supplier_id'),
			'jenis_id' => Input::get('jenis_id'),
			'ukuran_id' => Input::get('ukuran_id'),
			'warna_id' => Input::get('warna_id'),
		]);
		return Redirect::to('barang')->with('message','berhasil menambah barang dengan kode '.$barang->id);
	}
	public function prosesUbah(ValidasiBarangEdit $validasi)
	{
		$data = Barang::find(Input::get('id'));
		$data->nama = Input::get('nama');
		$data->harga_jual = Input::get('harga_jual');
		$data->hpp = Input::get('hpp');
		$data->save();
		return Redirect::to('barang')->with('message','berhasil mengedit barang dengan kode '.Input::get('id'));
	}
	public function prosesHapus()
	{
		Barang::destroy(Input::get('id'));
		return Redirect::to('barang')->with('message','berhasil menghapus barang dengan kode '.Input::get('id'));
	}
    public function barangterakhir()
    {
        Session::put('barang_terakhir', Input::has('terakhir') ? Input::get('search') : (Session::has('barang_terakhir') ? Session::get('barang_terakhir') : ''));

        $barang = Barang::where('id','LIKE',Session::get('barang_terakhir').'_________')
            ->orderBy('id','desc')
            ->first();
        return view('barang.barangterakhir')
            ->with([
                'barang'=>$barang,
            ]);
    }
}
