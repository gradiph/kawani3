@extends('layouts.app')
@section('title') Home | @stop
@section('content')

<div class="container">
  		{{-- NAVIGASI --}}
  		<li><a href="{{ URL('users') }}" class="btn btn-danger">Users</a></li>
  		<li><a href="{{ URL('barang') }}" class="btn btn-danger">Barang</a></li>
        <li><a href="{{ URL('transaksi') }}" class="btn btn-danger">Transaksi</a></li>
        <li><a href="{{ URL('diskon') }}" class="btn btn-danger">Diskon</a></li>
  		<li><a href="{{ URL('kasir') }}" class="btn btn-danger">Kasir</a></li>
  		<li><a href="{{ URL('logout') }}" class="btn btn-danger">Logout</a></li>
  		{{-- NAVIGASI --}}
</div>

@stop
