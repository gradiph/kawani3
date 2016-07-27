<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Input;
use Redirect;
use App\Http\Requests\validasiTambahBarang;
use App\Http\Requests\validasiEditBarang;

class BarangController extends Controller
{
	public function editData($id) {
		$data = DB::table('barang')->where('id','=',$id)->first();
		return view('barang_edit')->with('barang',$data);
	}
	public function hapusData($id) {
		DB::table('barang')->where('id','=',$id)->delete();
		return Redirect::to('barang')->with('message','berhasil menghapus data');
	}
	public function lihatData() {
		$data_barang = DB::table('barang')->get();
		
		return view('barang_read')->with('barang',$data_barang);
	}
	public function tambahData() {
		return view('barang_tambah');
	}
	public function prosesEditData(validasiEditBarang $data) {
		if(Input::get('username') != '')
		 	$username = Input::get('username');
		else
			$username = Input::get('hidden_username');
		if(Input::get('password') != '')
			$password = bcrypt(Input::get('password'));
		else
			$password = Input::get('hidden_password');
		$level = Input::get('level');
		$data = array(
			'username' => $username,
			'password' => $password,
			'level' => $level
		);
		DB::table('barang')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('barang')->with('message','berhasil mengedit data');
	}
    public function prosesTambahData(validasiTambahBarang $data) {
		$data = array(
			'kode' => Input::get('kode'),
			'kode_lama' => Input::get('kode_lama'),
			'nama' => Input::get('nama'),
			'hpp' => Input::get('hpp'),
			'harga_jual' => Input::get('harga_jual'),
			'stok_ot' => Input::get('stok_ot'),
			'stok_cmh' => Input::get('stok_cmh'),
			'stok_du' => Input::get('stok_du'),
			'stok_csn' => Input::get('stok_csn'),
			'stok_lkg' => Input::get('stok_lkg'),
			'stok_jtn' => Input::get('stok_jtn'),
			'stok_gdg' => Input::get('stok_gdg'),
		);
		
		DB::table('barang')->insertGetId($data);
		return Redirect::to('barang')->with('message','berhasil menambah data');
	}
}