@extends('layouts.app')
@section('title') Tambah Pembelian | @stop
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pembelian
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('pembelian/add/proses'), 'role' => 'form']) }}
                    <div class="row">
                        <div class="col-lg-3 form-group">
                            {{ Form::label('supplier','Supplier') }}
                            {{ Form::select('supplier', $supplier, '', ['class' => 'form-control','placeholder' => 'Pilih Supplier']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('jenis','Jenis') }}
                            {{ Form::select('jenis', $jenis, '', ['class' => 'form-control','placeholder' => 'Pilih Jenis']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('ukuran','Ukuran') }}
                            {{ Form::select('ukuran', $ukuran, '', ['class' => 'form-control','placeholder' => 'Pilih Ukuran']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('warna','Warna') }}
                            {{ Form::select('warna', $warna, '', ['class' => 'form-control','placeholder' => 'Pilih Warna']) }}
                        </div>
                        <div class="col-lg-6 form-group">
                            <div id="list-nama-barang"></div>
                        </div>
                        <div class="col-lg-6 form-group">
                            {{ Form::label('barang_id','Kode Barang') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('barang_id') }}</span>
                            @endif
                            {{ Form::text('barang_id', '', ['placeholder' => 'Kode Barang', 'class' => 'form-control']) }}
                        </div>
                        <div class="col-lg-3 form-group">
                            {{ Form::label('qty','Qty') }}
                            @if($errors->has())
                                <span class="label label-danger">{{ $errors->first('qty') }}</span>
                            @endif
                            {{ Form::number('qty', '', ['placeholder' => 'Jumlah Stok','class' => 'form-control','min'=>0]) }}
                        </div>
                        <div class="col-lg-offset-1 col-lg-6 text-center">
                            <br />
                            {{ Form::submit('Tambah Data', ['class' => 'btn btn-primary']) }}
                            <a href="{{url('pembelian')}}" class="btn btn-warning">Kembali</a>
                            <input class="btn btn-danger" type="reset" value="Reset">
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ambilListBarang() {
        var supplier_id = $("#supplier").val();
        var jenis_id = $("#jenis").val();
        var ukuran_id = $("#ukuran").val();
        var warna_id = $("#warna").val();
        $.ajax({
            type: "GET",
            url: "{{ url('pembelian/ambilListBarang') }}?supplier=" + supplier_id + "&jenis=" + jenis_id + '&ukuran=' + ukuran_id + '&warna=' + warna_id,
            success: function(data){
                $("#list-nama-barang").html(data);
                setKodeBarang();
                $("#barang_nama").change(function() {
                    setKodeBarang();
                });
            }
        });
    }
    function listBarang() {
        var supplier_id = $("#supplier").val();
        var jenis_id = $("#jenis").val();
        var ukuran_id = $("#ukuran").val();
        var warna_id = $("#warna").val();
        $.ajax({
            type: "GET",
            url: "{{ url('stok/ambilListBarang') }}/supplier/" + supplier_id + "/jenis/" + jenis_id + '/ukuran/' + ukuran_id + '/warna/' + warna_id,
            success: function(data){
                $("#list-nama-barang").html(data);
                $("#barang_nama").val($("#barang_id").val());
                $("#barang_nama").change(function() {
                    setKodeBarang();
                });
            }
        });
    }
    function setKodeBarang() {
        if ($("#barang_nama").val() != "")
            $("#barang_id").val($("#barang_nama").val());
    }
    $(document).ready(function(e) {
        ambilListBarang();
        $("#supplier").change(function() {
            ambilListBarang();
        });
        $("#jenis").change(function() {
            ambilListBarang();
        });
        $("#ukuran").change(function() {
            ambilListBarang();
        });
        $("#warna").change(function() {
            ambilListBarang();
        });
        $("#barang_id").bind("keyup", function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ url('stok/ambilDataBarang') }}/" + id,
                success: function(data){
                    $("#supplier").val(data.supplier_id);
                    $("#jenis").val(data.jenis_id);
                    $("#ukuran").val(data.ukuran_id);
                    $("#warna").val(data.warna_id);
                    listBarang();
                }
            });
        });
    });
</script>
@stop
