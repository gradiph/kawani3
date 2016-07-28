@extends('layouts.app')
@section('title') Tambah Cabang | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Cabang
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('cabang/add/proses')]) }}
                    {{ Form::label('nama','Nama Cabang') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', '', ['placeholder' => 'Nama Cabang','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('alamat','Alamat') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('alamat') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('alamat', '', ['placeholder' => 'Alamat','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('telepon','Telepon') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('telepon') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('telepon', '', ['placeholder' => 'Telepon','class' => 'form-control']) }}
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
