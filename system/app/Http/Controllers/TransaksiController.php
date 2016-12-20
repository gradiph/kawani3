<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\validasiTambahTransaksi;
use Kawani\Http\Controllers\Controller;
use DB;
use Input;
use Redirect;
use Auth;
use Kawani\Transaksi;
use Kawani\Toko;

class TransaksiController extends Controller
{
    public function editData($id) {
		$transaksi = Transaksi::find($id);
		return view('transaksi.edit')->with('transaksi',$transaksi);
	}
	public function hapusData($id) {
		$transaksi = Transaksi::find($id);
		return view('transaksi.hapus')->with('transaksi',$transaksi);
	}
	public function konfirmData() {
		return view('transaksi_tambah');
	}
	public function lihat() {
		$transaksis = Transaksi::paginate(25);
        $total = Transaksi::count();
		return view('transaksi.lihat')->with('transaksis',$transaksis)->with('total',$total);
	}
	public function lihatDetailData($id) {
		$transaksi = Transaksi::find($id);
        return view('detail_transaksi.lihat')
            ->with('transaksi',$transaksi);

//        $transaksi = DB::table('transaksi')
//						->where('id','=',$id)
//						->first();
//		$data = DB::table('detail_transaksi')
//					->join('barang','barang.id','=','detail_transaksi.id_barang')
//					->join('diskon','diskon.id','=','detail_transaksi.id_diskon')
//					->where('id_transaksi','=',$id)
//					->get();
//		$retur = DB::table('retur')
//					->join('barang','barang.id','=','retur.id_barang')
//					->where('id_transaksi','=',$id)
//					->get();
//		return view('detail_transaksi_read')
//				->with('detail_transaksi',$data)
//				->with('retur',$retur)
//				->with('transaksi',$transaksi);
	}
    public function tambah() {
        $tokos = Toko::all();
		return view('transaksi.tambah')->with(['tokos' => $tokos]);
	}
	public function prosesTambahData() {
		DB::transaction(function(){
			//inisialisasi
			$total_diskon = 0;
			$total_hpp = 0;
			$total_subtotal = 0;

			//insert tabel transaksi
			$data = array(
				'tgl' => date('Y-m-d'),
				'toko' => Input::get('toko'),
				'jenis_bayar' => Input::get('jenis_bayar'),
				'total_bayar' => Input::get('total_bayar'),
				'total_hpp' => 0,
				'total_diskon' => 0,
				'total_pieces' => Input::get('total_pieces'),
				'id_users' => Auth::user()->id,
			);
			DB::table('transaksi')->insertGetId($data);

			//dapatkan id transaksi
			$temp_id_transaksi = DB::table('transaksi')
									->where('id_users','=',Auth::user()->id)
									->where('total_hpp','=',0)
									->first();

			//transaksi tanpa voucher diskon
			$id_barang = Input::get('id_barang');
			$jumlah = Input::get('jumlah');
			$diskon = Input::get('diskon');
			$subtotal = Input::get('subtotal');
			for($i = 0; $i < count($id_barang); $i++) {
				//dapatkan hpp barang
				$temp_hpp = DB::table('barang')
								->where('id','=',$id_barang[$i])
								->first();

				$data = array(
					'id_transaksi' => $temp_id_transaksi->id,
					'id_barang' => $id_barang[$i],
					'harga_jual' => $temp_hpp->harga_jual,
					'jumlah' => $jumlah[$i],
					'hpp' => $temp_hpp->hpp,
				);

				DB::table('detail_transaksi')->insertGetId($data);

				$total_hpp += $temp_hpp->hpp;
				$total_subtotal += $subtotal[$i];

				//update table barang, kurangi stok
				if (Input::get('toko') == 'Otten') {
					$data = DB::table('barang')->where('id','=',$id_barang[$i])->first();
					DB::table('barang')->where('id','=',$id_barang[$i])->update(['stok_ot' => $data->stok_ot - $jumlah[$i]]);
				}
				if (Input::get('toko') == 'Cimahi') {
					$data = DB::table('barang')->where('id','=',$id_barang[$i])->first();
					DB::table('barang')->where('id','=',$id_barang[$i])->update(['stok_cmh' => $data->stok_cmh - $jumlah[$i]]);
				}
				if (Input::get('toko') == 'Dipati Ukur') {
					$data = DB::table('barang')->where('id','=',$id_barang[$i])->first();
					DB::table('barang')->where('id','=',$id_barang[$i])->update(['stok_du' => $data->stok_du - $jumlah[$i]]);
				}
				if (Input::get('toko') == 'Consina') {
					$data = DB::table('barang')->where('id','=',$id_barang[$i])->first();
					DB::table('barang')->where('id','=',$id_barang[$i])->update(['stok_csn' => $data->stok_csn - $jumlah[$i]]);
				}
				if (Input::get('toko') == 'Lengkong 2') {
					$data = DB::table('barang')->where('id','=',$id_barang[$i])->first();
					DB::table('barang')->where('id','=',$id_barang[$i])->update(['stok_lkg' => $data->stok_lkg - $jumlah[$i]]);
				}
				if (Input::get('toko') == 'Jatinangor') {
					$data = DB::table('barang')->where('id','=',$id_barang[$i])->first();
					DB::table('barang')->where('id','=',$id_barang[$i])->update(['stok_jtn' => $data->stok_jtn - $jumlah[$i]]);
				}
				if (Input::get('toko') == 'Gudang') {
					$data = DB::table('barang')->where('id','=',$id_barang[$i])->first();
					DB::table('barang')->where('id','=',$id_barang[$i])->update(['stok_gdg' => $data->stok_gdg - $jumlah[$i]]);
				}
			}

			//update table transaksi, ubah total_hpp dan total_diskon
			$data = array(
				'total_hpp' => $total_hpp,
				'total_diskon' => $total_subtotal - Input::get('total_bayar')
			);
			DB::table('transaksi')->where('id','=',$temp_id_transaksi->id)->update($data);

		});
		return Redirect::to('transaksi')->with('message','transaksi berhasil');
	}
    public function list()
    {
        Session::put('transaksi_toko', Input::has('toko') ? Input::get('search') : (Session::has('transaksi_toko') ? Session::get('transaksi_toko') : ''));
        Session::put('transaksi_jenis', Input::has('jenis') ? Input::get('search') : (Session::has('transaksi_jenis') ? Session::get('transaksi_jenis') : ''));

        $transaksis = Transaksi::where('toko_id','LIKE','%'.Session::get('transaksi_toko').'%')
            ->where('jenis_bayar','LIKE','%'.Session::get('transaksi_jenis').'%')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        $total = Barang::where('nama','LIKE','%'.Session::get('barang_nama').'%')
            ->where('supplier_id','LIKE','%'.Session::get('barang_supplier').'%')
            ->where('jenis_id','LIKE','%'.Session::get('barang_jenis').'%')
            ->where('ukuran_id','LIKE','%'.Session::get('barang_ukuran').'%')
            ->where('warna_id','LIKE','%'.Session::get('barang_warna').'%')
            ->count();
        return view('barang.list')
            ->with([
                'barangs'=>$barangs,
                'total'=>$total,
            ]);
    }
}
