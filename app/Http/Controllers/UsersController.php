<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Redirect;
use Auth;
use App\Http\Requests\validasiTambahUsers;
use App\Http\Requests\validasiEditUsers;

class UsersController extends Controller
{
	public function editData($id) {
		$data = DB::table('users')->where('id','=',$id)->first();
		return view('users_edit')->with('users',$data);
	}
	public function hapusData($id) {
		DB::table('users')->where('id','=',$id)->delete();
		return Redirect::to('users')->with('message','berhasil menghapus data');
	}
	public function lihatData() {
		$data = DB::table('users')->get();
		return view('users_read')->with('users',$data);
	}
	public function tambahData() {
		return view('users_tambah');
	}
	public function prosesEditData(validasiEditUsers $data) {
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
		DB::table('users')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('users')->with('message','berhasil mengedit data');
	}
    public function prosesTambahData(validasiTambahUsers $data) {
		$data = array(
			'username' => Input::get('username'),
			'password' => bcrypt(Input::get('password')),
			'level' => Input::get('level'),
		);
		
		DB::table('users')->insertGetId($data);
		return Redirect::to('users')->with('message','berhasil menambah data');
	}
}