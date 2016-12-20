<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiStokTambah;
use Kawani\Http\Requests\ValidasiStokUbah;
use Kawani\Stok;
use Kawani\Toko;
use Kawani\Barang;
use Kawani\Supplier;
use Kawani\Jenis;
use Kawani\Pembelian;
use Kawani\Ukuran;
use Kawani\Warna;
use Auth;
use DB;
use Input;
use Redirect;
use Session;

class StokController extends Controller
{
    public function lihat()
	{
		$suppliers = Supplier::orderBy('nama','asc')->get();
		$jeniss = Jenis::orderBy('nama','asc')->get();
		$ukurans = Ukuran::all();
		$warnas = Warna::orderBy('nama','asc')->get();

		return view('stok.lihat')
            ->with([
                'suppliers'=>$suppliers,
                'jeniss'=>$jeniss,
                'ukurans'=>$ukurans,
                'warnas'=>$warnas,
            ]);
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
		$stok = Stok::create([
			'toko_id' => Input::get('toko_id'),
			'barang_id' => Input::get('barang_id'),
			'qty' => Input::get('qty'),
		]);
        Pembelian::create([
            'barang_id' => $stok->barang_id,
            'toko_id' => $stok->toko_id,
            'jumlah' => $stok->qty,
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
    public function data($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }
    public function list()
    {
        Session::put('stok_nama', Input::has('nama') ? Input::get('search') : (Session::has('stok_nama') ? Session::get('stok_nama') : ''));
        Session::put('stok_supplier', Input::has('supplier') ? Input::get('search') : (Session::has('stok_nama') ? Session::get('stok_supplier') : ''));
        Session::put('stok_jenis', Input::has('jenis') ? Input::get('search') : (Session::has('stok_jenis') ? Session::get('stok_jenis') : ''));
        Session::put('stok_ukuran', Input::has('ukuran') ? Input::get('search') : (Session::has('stok_ukuran') ? Session::get('stok_ukuran') : ''));
        Session::put('stok_warna', Input::has('warna') ? Input::get('search') : (Session::has('stok_warna') ? Session::get('stok_warna') : ''));

        $tokos = Toko::orderBy('nama','asc')->get();
        $stoks = Stok::with(['barang' => function($query){
            $query->where([
                ['nama','like','%'.Session::get('stok_nama').'%'],
                ['supplier_id','like','%'.Session::get('stok_supplier').'%'],
                ['jenis_id','like','%'.Session::get('stok_jenis').'%'],
                ['ukuran_id','like','%'.Session::get('stok_ukuran').'%'],
                ['warna_id','like','%'.Session::get('stok_warna').'%'],
            ]);
        }])->get();
        return view('stok.list')
            ->with([
                'stoks'=>$stoks,
                'tokos'=>$tokos,
            ]);
    }
    public function resetList()
    {
        Session::put('stok_nama', '');
        Session::put('stok_supplier', '');
        Session::put('stok_jenis', '');
        Session::put('stok_ukuran', '');
        Session::put('stok_warna', '');

        $tokos = Toko::orderBy('nama','asc')->get();
//        $stoks = DB::table('stoks')
//            ->join('barangs','stoks.barang_id','=','barangs.id')
//            ->where('barangs.supplier_id',Session::get('stok_supplier'))
//            ->select('stoks.*','barangs.supplier_id')
//            ->get();
        $stoks = Stok::all();
//        return $stoks;
        return view('stok.list')
            ->with([
                'stoks'=>$stoks,
                'tokos'=>$tokos,
            ]);
    }
}
