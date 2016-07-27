@extends('template.t_index')
@section('content')

<p></p>
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		{{ Form::open(['url' => 'users/processAdd']) }}
		Username : 
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('username') }}</span>
			<p></p>
		@endif
		{{ Form::text('username', '', ['placeholder' => 'Username','class' => 'form-control']) }}
		Password : 
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('password') }}</span>
			<p></p>
		@endif
		{{ Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) }}
		<br />
		Level :
		<br />
		{{ Form::radio('level', 'SPG', true) }} SPG <br />
		{{ Form::radio('level', 'Staf') }} Staf <br />
		{{ Form::radio('level', 'HRD') }} HRD <br />
		{{ Form::radio('level', 'Keuangan') }} Keuangan <br />
		{{ Form::radio('level', 'Direktur') }} Direktur <br />
		{{ Form::radio('level', 'Admin') }} Admin <br />
		<p></p>
		{{ Form::submit('Tambah Data', ['class' => 'btn btn-danger']) }} <a href="{{ URL('users') }}" class="btn btn-danger">Kembali</a>
		{{ Form::close() }}
	</div>
</div>

@stop
