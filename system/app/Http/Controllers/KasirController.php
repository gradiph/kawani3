<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Redirect;
use Input;
use Auth;

class KasirController extends Controller
{
    public function konfirmData() {
		$toko = Input::get('toko');

		return view('kasir_tambah')
				->with('id_barang',Input::get('id_barang'))
				->with('jumlah',Input::get('jumlah'))
				->with('diskon',Input::get('diskon'))
				->with('toko',$toko);
	}
    public function pilihData() {
		$data = DB::table('barang')->get();
		return view('kasir_pilih_barang')->with('barang',$data);
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
		return Redirect::to('kasir')->with('message','transaksi berhasil');
	}
}
