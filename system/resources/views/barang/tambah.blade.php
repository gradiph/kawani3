@extends('layouts.app')
@section('title') Tambah Barang | @stop
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
                    Tambah Barang
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            Kode Barang Terakhir: <span id="barang_terakhir"></span>
                        </div>
                    </div>
                    <hr>
                    {{ Form::open(['url' => url('barang/add/proses'), 'role' => 'form']) }}
                    <div class="row">
                    	<div class="col-lg-5 form-group">
                            {{ Form::label('no','Kode Barang') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('id') }}</span>
                            @endif
                            <br />
                            {{ Form::text('supplier_id', '', ['title' => 'Kode Supplier', 'class' => 'form-control-static btn-sm disabled', 'size' => '1', 'readonly' => 'readonly','id'=>'supplier_id']) }}
                            {{ Form::text('no', '', ['autofocus' => 'autofocus', 'class' => 'form-control-static btn-sm', 'size' => '2', 'maxlength' => '4', 'id' => 'no']) }}
                            {{ Form::text('jenis_id', '', ['title' => 'Kode Jenis', 'class' => 'form-control-static btn-sm disabled', 'size' => '1', 'readonly' => 'readonly', 'id' => 'jenis_id']) }}
                            {{ Form::text('ukuran_id', '', ['title' => 'Kode Ukuran', 'class' => 'form-control-static btn-sm disabled', 'size' => '1', 'readonly' => 'readonly', 'id' => 'ukuran_id']) }}
                            {{ Form::text('warna_id', '', ['title' => 'Kode Warna', 'class' => 'form-control-static btn-sm disabled', 'size' => '1', 'readonly' => 'readonly', 'id' => 'warna_id']) }}
                            {{ Form::hidden('id','',['id'=>'id']) }}
                        </div>
                    	<div class="col-lg-7 form-group">
                            {{ Form::label('nama','Nama Barang') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('nama') }}</span>
                            @endif
                            {{ Form::text('nama', '', ['placeholder' => 'Nama Barang','class' => 'form-control','id'=>'nama']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('supplier','Supplier') }}
                            {{ Form::select('supplier', $supplier, '', ['class' => 'form-control','id'=>'supplier']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('jenis','Jenis') }}
                            {{ Form::select('jenis', $jenis, '', ['class' => 'form-control','id'=>'jenis']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('ukuran','Ukuran') }}
                            {{ Form::select('ukuran', $ukuran, '', ['class' => 'form-control','id'=>'ukuran']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('warna','Warna') }}
                            {{ Form::select('warna', $warna, '', ['class' => 'form-control','id'=>'warna']) }}
                        </div>
                        <div class="col-lg-4 form-group">
                        	{{ Form::label('harga_jual','Harga Jual') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('harga_jual') }}</span>
                            @endif
                            {{ Form::number('harga_jual', '', ['placeholder' => 'Harga Jual','min' => '0','max' => '99999999999','class' => 'form-control']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                        	{{ Form::label('hpp','HPP') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('hpp') }}</span>
                            @endif
                            {{ Form::number('hpp', '', ['placeholder' => 'HPP','min' => '0','max' => '99999999999','class' => 'form-control']) }}
                        </div>
                        <div class="col-lg-2 col-lg-offset-1">
                        	<br />
                            {{ Form::submit('Tambah Data', ['class' => 'btn btn-primary']) }}
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
    function setKode(a) {
        var id = $("#"+a).val();
        $("#"+a+"_id").val(id);
        setId();
    }
    function barangTerakhir(){
        ajaxLoad('{{url('barang/barangterakhir')}}?terakhir=1&search='+$("#supplier").val(),'barang_terakhir')
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
    $("#supplier").change(function() {
        setKode('supplier');
        barangTerakhir();
    });
    $("#jenis").change(function() {
        setKode('jenis');
    });
    $("#ukuran").change(function() {
        setKode('ukuran');
    });
    $("#warna").change(function() {
        setKode('warna');
    });
    $("#no").bind('keyup',function() {
        setId();
    });
    $(document).ready(function(e){
        setKode('supplier');
        setKode('jenis');
        setKode('ukuran');
        setKode('warna');
        barangTerakhir();
    });
</script>
@stop
