@extends('layouts.app')
@section('title') Ubah Password | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Password
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('user/'.$users->id.'/password/proses'), 'role' => 'form']) }}
                    {{ Form::hidden('id', $users->id) }}
                    {{ Form::label('password','Password') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('password') }}</span>
                        <p></p>
                    @endif
                    {{ Form::password('password', ['autofocus' => 'autofocus', 'class' => 'form-control']) }}
                    <br />
                    <div class="text-center">
                    	{{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                        <a href="{{url('user')}}" class="btn btn-warning">Kembali</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
