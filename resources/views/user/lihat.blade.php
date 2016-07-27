@extends('layouts.app')
@section('content')

@if(Session::has('message'))
	<span class="label label-success">{{ Session::get('message') }}</span>
@endif
<p></p>
<div class="container">
    <div class="row">
    	<div class="col-lg-6 col-lg-offset-3">
            <div class="table-responsive text-center">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <td><b>No</b></td>
                        <td><b>Username</b></td>
                        <td><b>Level</b></td>
                        <td><b>Action</b></td>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($users as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->level }}</td>
                                <td><a href="{{ url('user/delete/'.$data->id) }}">Hapus</a> | <a href="{{ url('user/edit/'. $data->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ URL('user/add') }}" class="btn btn-danger">Tambah Data</a>
                <a href="{{ URL('') }}" class="btn btn-danger">Kembali ke Menu</a>
            </div>
        </div>
    </div>
</div>
@stop