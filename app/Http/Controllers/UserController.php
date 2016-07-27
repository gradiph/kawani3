<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Redirect;
use Input;
use Auth;
use Kawani\Http\Requests\ValidasiUserTambah;
use Kawani\Http\Requests\ValidasiUserEdit;
use User;

class UserController extends Controller
{
	public function lihat() {
		$data = User::all();
		return view('user.lihat')->with('users',$data);
	}
	public function tambah() {
		return view('user.tambah');
	}
	public function hapus($id) {
		User::destroy($id);
		return Redirect::to('user')->with('message','berhasil menghapus data');
	}
    public function ubah($id) {
		User::find($id);
		return view('user.edit')->with('users',$data);
	}
    public function prosesTambah(ValidasiUserTambah $validasi) {
		User::create([
			'username' => Input::get('username'),
			'nama' => Input::get('nama'),
			'password' => bcrypt(Input::get('password')),
			'level' => Input::get('level'),
		]);
		return Redirect::to('user')->with('message','berhasil menambah data');
	}
	public function prosesEdit(ValidasiUserEdit $validasi) {
		$data = User::find(Input::get('id'));
		$data->username = Input::get('username');
		$data->nama = Input::get('nama');
		$data->level = Input::get('level');
		
		return Redirect::to('user')->with('message','berhasil mengedit data');
	}
}
