@extends('layouts.app')
@section('title') Ubah Warna | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Warna
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('warna/'.$warna->id.'/edit/proses'), 'role' => 'form']) }}
                    {{ Form::label('id','Kode Warna') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('id') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('id', $warna->id, ['placeholder' => 'Kode Warna','class' => 'form-control','readonly'=>'readonly']) }}
                    <br />
                    {{ Form::label('nama','Nama Warna') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', $warna->nama, ['placeholder' => 'Nama Warna','class' => 'form-control']) }}
                    <br />
                    <div class="text-center">
                    	{{ Form::submit('Ubah Data', ['class' => 'btn btn-primary']) }}
                        <a href="{{url('warna')}}" class="btn btn-warning">Kembali</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
