<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiPembelianTambah;
use Kawani\Pembelian;
use Kawani\Stok;
use Kawani\Toko;
use Kawani\Supplier;
use Kawani\Jenis;
use Kawani\Ukuran;
use Kawani\Warna;
use Kawani\Barang;
use Input;

class PembelianController extends Controller
{
    public function lihat()
    {
        return view('pembelian.lihat');
    }
    public function list()
    {
        $pembelians = Pembelian::orderBy('created_at','desc')->paginate(8);
        return view('pembelian.list')
            ->with([
                'pembelians'=>$pembelians,
            ]);
    }
    public function tambah()
    {
        $tokos = Toko::orderBy('nama','asc')->get();
        $suppliers = Supplier::orderBy('nama','asc')->get();
		$jeniss = Jenis::orderBy('nama','asc')->get();
		$ukurans = Ukuran::all();
		$warnas = Warna::orderBy('nama','asc')->get();
        return view('pembelian.tambah')
            ->with([
                'tokos' => $tokos,
                'suppliers' => $suppliers,
                'jeniss' => $jeniss,
                'ukurans' => $ukurans,
                'warnas' => $warnas,
            ]);
    }
    public function listbarang()
    {
        $barangs = Barang::where("supplier_id",'like','%'.Input::get('supplier').'%')
                ->where("jenis_id",'like','%'.Input::get('jenis').'%')
                ->where("ukuran_id",'like','%'.Input::get('ukuran').'%')
                ->where("warna_id",'like','%'.Input::get('warna').'%')
                ->get();
        return view('pembelian.list_barang')->with('barangs',$barangs);
    }
    public function prosesTambah(ValidasiPembelianTambah $valid)
    {
        $barang_id = Input::get('barang_id');
        $jumlah = Input::get('qty');

        $pembelian = new Pembelian;
        $pembelian->barang_id = $barang_id;
        $pembelian->jumlah = $jumlah;
        if($pembelian->save())
        {
            $stok = Stok::where([
                ['barang_id',$barang_id],
                ['toko_id','7'],
            ])->first();
            if($stok)
            {
                $stok->qty += $jumlah;
            }
            else
            {
                $stok = new Stok;
                $stok->toko_id = '7';
                $stok->barang_id = $barang_id;
                $stok->qty = $jumlah;
            }
            if($stok->save())
            {
                return redirect('pembelian')->with('message','Pembelian berhasil');
            }
        }
    }
}
