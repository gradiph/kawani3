@extends('layouts.app')
@section('title') Ubah Cabang | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Cabang
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('cabang/'.$toko->id.'/edit/proses'), 'role' => 'form']) }}
                    {{ Form::hidden('id', $toko->id) }}
                    {{ Form::label('nama','Nama Cabang') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', $toko->nama, ['autofocus' => 'autofocus', 'placeholder' => 'Nama Cabang','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('alamat','Alamat') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('alamat') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('alamat', $toko->alamat, ['placeholder' => 'Alamat','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('telepon','Telepon') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('telepon') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('telepon', $toko->telepon, ['placeholder' => 'Telepon','class' => 'form-control']) }}
                    <br />
                    <div class="col-lg-offset-2">
                    	{{ Form::submit('Ubah Data', ['class' => 'btn btn-primary']) }} 
                        <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop