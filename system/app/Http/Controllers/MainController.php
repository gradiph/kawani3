<?php

namespace Kawani\Http\Controllers;

use Illuminate\Http\Request;
use Kawani\Http\Requests;
use Kawani\Http\Controllers\Controller;
use DB;
use Input;
use Redirect;
use Auth;
use Kawani\Http\Requests\validasiLogin;

class MainController extends Controller
{
	public function home() {
		if (Auth::user()) {
			if (Auth::user()->level=="Admin") {
				return view('home.admin');
			}
            return view('home.admin');
		}
		else {
			return Redirect::to('login');
		}
	}
	public function login() {
		return view('home.login');
	}
	public function prosesLogin(validasilogin $validasi) {
		if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')],Input::get('remember'))) {
			return Redirect::to('home');
		}
		else {
			return Redirect::to('login')->with('message','salah username atau salah password');
		}
	}
	public function logout() {
		Auth::logout();
		return Redirect::to('login')->with('message','berhasil logout');
	}
}
