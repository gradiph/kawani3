@extends('layouts.app')
@section('title') Ubah Stok Cabang {{ $stok->toko->nama }} | @stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Stok Cabang {{ $stok->toko->nama }}
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('stok/'.$stok->id.'/edit/proses'), 'role' => 'form']) }}
                    {{ Form::hidden('stok_id',$stok->id) }}
                    <div class="row">
                        <div class="col-lg-3 form-group">
                            {{ Form::label('supplier','Supplier') }}
                            {{ Form::text('supplier', $stok->barang->supplier->nama, ['class' => 'form-control','readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('jenis','Jenis') }}
                            {{ Form::text('jenis', $stok->barang->jenis->id, ['class' => 'form-control','readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('ukuran','Ukuran') }}
                            {{ Form::text('ukuran', $stok->barang->ukuran->id, ['class' => 'form-control','readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('warna','Warna') }}
                            {{ Form::text('warna', $stok->barang->warna->id, ['class' => 'form-control','readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-6 form-group">
                            {{ Form::label('barang_nama','Nama Barang') }}
                            {{ Form::text('barang_nama', $stok->barang->nama, ['class' => 'form-control','readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-6 form-group">
                            {{ Form::label('barang_id','Kode Barang') }}
                            {{ Form::text('barang_id', $stok->barang->id, ['class' => 'form-control','readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('qty','Qty') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('qty') }}</span>
                            @endif
                            {{ Form::number('qty', $stok->qty, ['autofocus' => 'autofocus', 'placeholder' => 'Jumlah Stok','class' => 'form-control']) }}
                        </div>
                        <div class="col-lg-offset-1 col-lg-6 text-center">
                            <br />
                            {{ Form::submit('Ubah Data', ['class' => 'btn btn-primary']) }}
                            <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
