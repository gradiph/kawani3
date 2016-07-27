@extends('layouts.app')
@section('content')

@if(Session::has('message'))
	<span class="label label-success">{{ Session::get('message') }}</span>
@endif
<p></p>
<div class="panel panel-default">
	<div class="panel-heading">
		Ubah Data
	</div>
	<div class="panel-body">
		{{ Form::open(['url' => 'users/processEdit']) }}
		{{ Form::hidden('id', $users->id) }}
		{{ Form::hidden('hidden_username', $users->username) }}
		{{ Form::hidden('hidden_password', $users->password) }}
		Username:
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('username') }}</span>
			<p></p>
		@endif
		{{ Form::text('username',$users->username, ['placeholder' => 'Username','class' => 'form-control']) }}
		Password:
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('password') }}</span>
			<p></p>
		@endif
		{{ Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) }}
		<br />
		Level :
		<br />
		@if($users->level == 'SPG')
			{{ Form::radio('level', 'SPG', true) }} SPG <br />
		@else
			{{ Form::radio('level', 'SPG') }} SPG <br />
		@endif
		@if($users->level == 'Staf')
			{{ Form::radio('level', 'Staf', true) }} Staf <br />
		@else
			{{ Form::radio('level', 'Staf') }} Staf <br />
		@endif
		@if($users->level == 'HRD')
			{{ Form::radio('level', 'HRD', true) }} HRD <br />
		@else
			{{ Form::radio('level', 'HRD') }} HRD <br />
		@endif
		@if($users->level == 'Keuangan')
			{{ Form::radio('level', 'Keuangan', true) }} Keuangan <br />
		@else
			{{ Form::radio('level', 'Keuangan') }} Keuangan <br />
		@endif
		@if($users->level == 'Direktur')
			{{ Form::radio('level', 'Direktur', true) }} Direktur <br />
		@else
			{{ Form::radio('level', 'Direktur') }} Direktur <br />
		@endif
		@if($users->level == 'Admin')
			{{ Form::radio('level', 'Admin', true) }} Admin <br />
		@else
			{{ Form::radio('level', 'Admin') }} Admin <br />
		@endif
		<p></p>
		{{ Form::submit('Ubah Data',['class' => 'btn btn-danger']) }}
		{{ Form::close() }}
	</div>
</div>
@stop