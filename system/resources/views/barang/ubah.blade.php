@extends('layouts.app')
@section('title') Ubah Barang | @stop
@section('content')
<?php
$supplier = [];
$jenis = [];
$ukuran = [];
$warna = [];
foreach ($suppliers as $data) $supplier += [$data->id => $data->nama];
foreach ($jeniss as $data) $jenis += [$data->id => $data->nama];
foreach ($ukurans as $data) $ukuran += [$data->id => $data->nama];
foreach ($warnas as $data) $warna += [$data->id => $data->nama];
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ubah Barang
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('barang/'.$barang->id.'/edit/proses'), 'role' => 'form']) }}
                    <div class="row">
                    	<div class="col-lg-5 form-group">
                            {{ Form::label('no','Kode Barang') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('id') }}</span>
                            @endif
                            <br />
                            {{ Form::text('supplier_id', '', ['title' => 'Kode Supplier', 'class' => 'form-control-static btn-sm', 'size' => '1', 'readonly' => 'readonly','id'=>'supplier_id']) }}
                            {{ Form::text('no', substr($barang->id,3,4), ['class' => 'form-control-static btn-sm', 'size' => '2', 'maxlength' => '4', 'id' => 'no', 'readonly' => 'readonly']) }}
                            {{ Form::text('jenis_id', '', ['title' => 'Kode Jenis', 'class' => 'form-control-static btn-sm', 'size' => '1', 'readonly' => 'readonly', 'id' => 'jenis_id']) }}
                            {{ Form::text('ukuran_id', '', ['title' => 'Kode Ukuran', 'class' => 'form-control-static btn-sm', 'size' => '1', 'readonly' => 'readonly', 'id' => 'ukuran_id']) }}
                            {{ Form::text('warna_id', '', ['title' => 'Kode Warna', 'class' => 'form-control-static btn-sm', 'size' => '1', 'readonly' => 'readonly', 'id' => 'warna_id']) }}
                            {{ Form::hidden('id','',['id' => 'id']) }}
                            {{ Form::hidden('id_lama','',['id' => 'id_lama']) }}
                        </div>
                    	<div class="col-lg-7 form-group">
                            {{ Form::label('nama','Nama Barang') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('nama') }}</span>
                            @endif
                            {{ Form::text('nama', $barang->nama, ['autofocus' => 'autofocus', 'placeholder' => 'Nama Barang','class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('supplier','Supplier') }}
                            {{ Form::select('supplier', $supplier, $barang->supplier->id, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('jenis','Jenis') }}
                            {{ Form::select('jenis', $jenis, $barang->jenis->id, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('ukuran','Ukuran') }}
                            {{ Form::select('ukuran', $ukuran, $barang->ukuran->id, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('warna','Warna') }}
                            {{ Form::select('warna', $warna, $barang->warna->id, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                        </div>
                        <div class="col-lg-4 form-group">
                        	{{ Form::label('harga_jual','Harga Jual') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('harga_jual') }}</span>
                            @endif
                            {{ Form::number('harga_jual', $barang->harga_jual, ['placeholder' => 'Harga Jual','min' => '0','max' => '99999999999','class' => 'form-control']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('hpp','HPP') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('hpp') }}</span>
                            @endif
                            {{ Form::number('hpp', $barang->hpp, ['placeholder' => 'HPP','min' => '0','max' => '99999999999','class' => 'form-control']) }}
                        </div>
                        <div class="col-lg-2 col-lg-offset-1">
                        	<br />
                            {{ Form::submit('Ubah Data', ['class' => 'btn btn-primary']) }}
                        </div>
                        <div class="col-lg-2">
                        	<br />
                            <a href="{{url('barang')}}" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function setKodeSupplier() {
	var id = $("#supplier").val();
	$("#supplier_id").val(id);
	setId();
}
function setKodeJenis() {
	var id = $("#jenis").val();
	$("#jenis_id").val(id);
	setId();
}
function setKodeUkuran() {
	var id = $("#ukuran").val();
	$("#ukuran_id").val(id);
	setId();
}
function setKodeWarna() {
	var id = $("#warna").val();
	$("#warna_id").val(id);
	setId();
}
function setId() {
	var
		supplier_id = $("#supplier_id").val(),
		no = $("#no").val(),
		jenis_id = $("#jenis_id").val(),
		ukuran_id = $("#ukuran_id").val(),
		warna_id = $("#warna_id").val();
	$("#id").val(supplier_id + no + jenis_id + ukuran_id + warna_id);
}
$(document).ready(function(e) {
    setKodeSupplier();
	setKodeJenis();
	setKodeUkuran();
	setKodeWarna();
});
</script>
@stop
