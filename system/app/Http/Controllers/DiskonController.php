<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use Input;
use Redirect;
use App\Http\Requests\validasiTambahDiskon;
use App\Http\Requests\validasiEditDiskon;

class DiskonController extends Controller
{
	public function lihatData() {
		$data = DB::table('diskon')
					->join('users','users.id','=','diskon.id_users')
					->get();
		return view('diskon_read')->with('diskon',$data);
	}
	public function tambahData() {
		return view('diskon_tambah');
	}
	public function prosesTambahData(validasiTambahdiskon $data) {
		$jenis = Input::get('jenis');
		$kode_diskon = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,5);
		$data = array(
			'id_users' => Auth::user()->id,
			'tgl' => date('Y-m-d'),
			'persen_diskon' => Input::get('persen_diskon'),
			'kode_diskon' => $kode_diskon,
			'aktif' => 'Y',
			'keterangan' => Input::get('keterangan'),
		);

		DB::table('diskon')->insertGetId($data);
		return Redirect::to('diskon')->with('message','berhasil menambah data');
	}
}
