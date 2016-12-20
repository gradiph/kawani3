@extends('layouts.app')
@section('title') Ubah Ukuran | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Ukuran
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('ukuran/'.$ukuran->id.'/edit/proses'), 'role' => 'form']) }}
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
                    {{ Form::text('nama', $ukuran->nama, ['placeholder' => 'Nama Ukuran','class' => 'form-control']) }}
                    <br />
                    <div class="text-center">
                    	{{ Form::submit('Ubah Data', ['class' => 'btn btn-primary']) }}
                        <a href="{{url('ukuran')}}" class="btn btn-warning">Kembali</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
