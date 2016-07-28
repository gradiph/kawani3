@extends('layouts.app')
@section('title') Daftar User | @stop
@section('content')

<div class="container">
    <div class="row">
    	<div class="col-lg-7">
            @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message') }}
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
            @endif
        	<h2>
            	Pengolahan Data User
            	<a href="{{ URL('user/add') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</a>
            </h2>
            <hr />
            <table class="table table-responsive table-bordered table-hover table-striped text-center">
                <thead>
                    <td><b>No</b></td>
                    <td><b>Username</b></td>
                    <td><b>Nama</b></td>
                    <td><b>Level</b></td>
                    <td><b>Action</b></td>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($users as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->level }}</td>
                            <td>
                                <button onclick="javascript: window.location.href = '{{ url('user/'.$data->id.'/password') }}'" title="Ubah Password" class="btn-warning img-rounded"><span class="glyphicon glyphicon-lock"></span></button>
                                <button onclick="javascript: window.location.href = '{{ url('user/'.$data->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                            	<button onclick="javascript: window.location.href = '{{ url('user/'.$data->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop