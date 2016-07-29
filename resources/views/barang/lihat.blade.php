@extends('layouts.app')
@section('title') Daftar Barang | @stop
@section('content')

<div class="container">
    <div class="row">
    	<div class="col-lg-12">
            @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message') }}
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
            @endif
        	<h2>
            	Pengolahan Data Barang
            	<a href="{{ URL('barang/add') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</a>
            </h2>
            <hr />
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped text-center">
                    <thead>
                        <td><b>No</b></td>
                        <td><b>Kode</b></td>
                        <td><b>Nama</b></td>
                        <td><b>Supplier</b></td>
                        <td><b>Jenis</b></td>
                        <td><b>Ukuran</b></td>
                        <td><b>Warna</b></td>
                        <td><b>Harga Jual</b></td>
                        <td><b>HPP</b></td>
                        <td><b>Action</b></td>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $barang->id }}</td>
                                <td>{{ $barang->nama }}</td>
                                <td>{{ $barang->supplier->nama }}</td>
                                <td>{{ $barang->jenis->nama }}</td>
                                <td>{{ $barang->ukuran->nama }}</td>
                                <td>{{ $barang->warna->nama }}</td>
                                <td>{{ $barang->harga_jual }}</td>
                                <td>{{ $barang->hpp }}</td>
                                <td>
                                    <button onclick="javascript: window.location.href = '{{ url('barang/'.$barang->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                                    <button onclick="javascript: window.location.href = '{{ url('barang/'.$barang->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop