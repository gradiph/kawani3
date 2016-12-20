@extends('layouts.app')
@section('title') Hapus Supplier | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hapus Supplier
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('supplier/'.$supplier->id.'/delete/proses'), 'role' => 'form']) }}
                    {{ Form::label('id','Kode Supplier') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('id') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('id', $supplier->id, ['placeholder' => 'Kode Supplier','class' => 'form-control','readonly'=>'readonly']) }}
                    <br />
                    {{ Form::label('nama','Nama Supplier') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', $supplier->nama, ['placeholder' => 'Nama Supplier','class' => 'form-control','readonly'=>'readonly']) }}
                    <br />
                    <div class="text-center">
                    	{{ Form::submit('Hapus Data', ['class' => 'btn btn-primary']) }}
                        <a href="{{url('supplier')}}" class="btn btn-warning">Kembali</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
