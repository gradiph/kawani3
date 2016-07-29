@extends('layouts.app')
@section('title') Tambah Jenis | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Jenis
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('jenis/add/proses'), 'role' => 'form']) }}
                    {{ Form::label('id','Kode Jenis') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('id') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('id', '', ['placeholder' => 'Kode Jenis','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('nama','Nama Jenis') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', '', ['placeholder' => 'Nama Jenis','class' => 'form-control']) }}
                    <br />
                    <div class="col-lg-offset-2">
                    	{{ Form::submit('Tambah Data', ['class' => 'btn btn-primary']) }} 
                        <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
