@extends('template.t_index')
@section('content')

@if(Session::has('message'))
	<span class="label label-success">{{ Session::get('message') }}</span>
@endif
<p></p>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>Username</th>
			<th>Level</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($users as $data)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $data->username }}</td>
					<td>{{ $data->level }}</td>
					<td><a href="delete/{{ $data->id }}">Hapus</a> | <a href="edit/{{ $data->id }}">Edit</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<a href="{{ URL('users/add') }}" class="btn btn-danger">Tambah Data</a>
	<a href="{{ URL('') }}" class="btn btn-danger">Kembali ke Menu</a>
</div>

@stop