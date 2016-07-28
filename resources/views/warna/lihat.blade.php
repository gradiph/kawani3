@extends('layouts.app')
@section('title') Daftar Warna | @stop
@section('content')

<div class="container">
    <div class="row">
    	<div class="col-lg-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message') }}
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
            @endif
        	<h2>
            	Pengolahan Data Warna
            	<a href="{{ URL('warna/add') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</a>
            </h2>
            <hr />
            <div class="pull-right">{{ $warnas->render() }}</div>
            <table class="table table-responsive table-bordered table-hover table-striped text-center">
                <thead>
                    <td><b>No</b></td>
                    <td><b>Kode</b></td>
                    <td><b>Nama</b></td>
                    <td><b>Action</b></td>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($warnas as $warna)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $warna->id }}</td>
                            <td>{{ $warna->nama }}</td>
                            <td>
                                <button onclick="javascript: window.location.href = '{{ url('warna/'.$warna->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                            	<button onclick="javascript: window.location.href = '{{ url('warna/'.$warna->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            Total Data : {{ $total }}
            <div class="pull-right">{{ $warnas->render() }}</div>
        </div>
    </div>
</div>
@stop