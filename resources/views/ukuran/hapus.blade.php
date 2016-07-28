@extends('layouts.app')
@section('title') Hapus Ukuran | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hapus Ukuran
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('ukuran/'.$ukuran->id.'/delete/proses')]) }}
                    {{ Form::label('id','Kode Ukuran') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('id') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('id', $ukuran->id, ['placeholder' => 'Kode Ukuran','class' => 'form-control','readonly'=>'readonly']) }}
                    <br />
                    {{ Form::label('nama','Nama Ukuran') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', $ukuran->nama, ['placeholder' => 'Nama Ukuran','class' => 'form-control','readonly'=>'readonly']) }}
                    <br />
                    <div class="col-lg-offset-2">
                    	{{ Form::submit('Hapus Data', ['class' => 'btn btn-primary']) }} 
                        <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop