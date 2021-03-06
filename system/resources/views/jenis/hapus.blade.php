@extends('layouts.app')
@section('title') Hapus Jenis | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hapus Jenis
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('jenis/'.$jenis->id.'/delete/proses'), 'role' => 'form']) }}
                    {{ Form::label('id','Kode Jenis') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('id') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('id', $jenis->id, ['placeholder' => 'Kode Jenis','class' => 'form-control','readonly'=>'readonly']) }}
                    <br />
                    {{ Form::label('nama','Nama Jenis') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', $jenis->nama, ['placeholder' => 'Nama Jenis','class' => 'form-control','readonly'=>'readonly']) }}
                    <br />
                    <div class="text-center">
                    	{{ Form::submit('Hapus Data', ['class' => 'btn btn-primary']) }}
                        <a href="{{url('jenis')}}" class="btn btn-warning">Kembali</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
