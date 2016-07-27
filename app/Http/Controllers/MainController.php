<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Redirect;
use Auth;
use App\Http\Requests\validasiLogin;

class MainController extends Controller
{
	public function index() {
		if (Auth::user()) {
			if (Auth::user()->level=="Admin") {
				return Redirect::to('home');
			}
		}
		else {
			return Redirect::to('login');
		}
	}
	public function home() {
		if (Auth::user()) {
			if (Auth::user()->level=="Admin") {
				return view('home');
			}
		}
		else {
			return Redirect::to('login');
		}
	}
	public function login() {
		if (Auth::user()) {
			if (Auth::user()->level=="Admin") {
				return Redirect::to('home');
			}
		}
		else {
			return view('login');
		}
	}
	public function prosesLogin(validasilogin $validasi) {
		if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')])) {
			if (Auth::user()->level=="Admin") {
				return Redirect::to('home');
			}
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
