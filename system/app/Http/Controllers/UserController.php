<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Requests\ValidasiUserTambah;
use Kawani\Http\Requests\ValidasiUserEdit;
use Kawani\Http\Requests\ValidasiUserUbahPass;
use Kawani\User;
use Auth;
use Input;
use Redirect;
use Session;

class UserController extends Controller
{
    public function lihat()
	{
		return view('user.lihat');
	}
    public function list()
    {
        Session::put('user_nama', Input::has('nama') ? Input::get('search') : (Session::has('user_nama') ? Session::get('user_nama') : ''));
        Session::put('user_field', Input::has('field') ? Input::get('field') : (Session::has('user_field') ? Session::get('user_field') : 'nama'));
        Session::put('user_sort', Input::has('sort') ? Input::get('sort') : (Session::has('user_sort') ? Session::get('user_sort') : 'asc'));

        $users = User::where('nama','LIKE','%'.Session::get('user_nama').'%')
            ->orderBy(Session::get('user_field'), Session::get('user_sort'))
            ->paginate(8);
        return view('user.list')
            ->with([
                'users'=>$users,
            ]);
    }
	public function tambah()
	{
		return view('user.tambah');
	}
	public function hapus($id)
	{
		$data = User::find($id);
		return view('user.hapus')->with('users',$data);
	}
    public function ubah($id)
	{
		$data = User::find($id);
		return view('user.ubah')->with('users',$data);
	}
    public function prosesTambah(ValidasiUserTambah $validasi)
	{
		User::create([
			'username' => Input::get('username'),
			'nama' => Input::get('nama'),
			'password' => bcrypt(Input::get('password')),
			'level' => Input::get('level'),
		]);
		return Redirect::to('user')->with('message','berhasil menambah data');
	}
	public function prosesUbah(ValidasiUserEdit $validasi)
	{
		$data = User::find(Input::get('id'));
		$data->username = Input::get('username');
		$data->nama = Input::get('nama');
		$data->level = Input::get('level');
		$data->save();
		return Redirect::to('user')->with('message','berhasil mengedit data');
	}
	public function prosesHapus()
	{
		User::destroy(Input::get('id'));
		return Redirect::to('user')->with('message','berhasil menghapus data');
	}
	public function ubahPass($id)
	{
		$data = User::find($id);
		return view('user.ubah_pass')->with('users',$data);
	}
	public function prosesUbahPass(ValidasiUserUbahPass $validasi)
	{
		$data = User::find(Input::get('id'));
		$data->password = bcrypt(Input::get('password'));
		$data->save();
		return Redirect::to('user')->with('message','berhasil mengubah password');
	}
}
