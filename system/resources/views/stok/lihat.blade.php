@extends('layouts.app')
@section('title') Daftar Stok | @stop
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
            @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message') }}
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
            @endif
        	<h2>
            	Stok Cabang
            </h2>
            <hr />
            <div class="col-lg-3">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" id="search" value="{{ Session::get('stok_nama') }}"
                               onkeyup="if (event.keyCode == 13) ajaxLoad('{{url('stok/list')}}?nama=1&search='+this.value,'data')"
                               placeholder="Cari Nama Barang ..."
                               type="text"
                               autofocus>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default"
                                    onclick="ajaxLoad('{{url('stok/list')}}?nama=1&search='+$('#search').val(),'data')"><i
                                        class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                {{Form::select(
                    'supplier',
                    $supplier,
                    Session::get('stok_supplier'),
                    [
                        'placeholder'=>'Cari Supplier ...',
                        'class'=>'form-control',
                        'onchange'=>"ajaxLoad('".url('stok/list')."?supplier=1&search='+$(this).val(),'data')",
                        'id'=>'supplier',
                    ]
                )}}
            </div>
            <div class="col-lg-2">
                {{Form::select(
                    'jenis',
                    $jenis,
                    Session::get('stok_jenis'),
                    [
                        'placeholder'=>'Cari Jenis ...',
                        'class'=>'form-control',
                        'onchange'=>"ajaxLoad('".url('stok/list')."?jenis=1&search='+$(this).val(),'data')",
                        'id'=>'jenis',
                    ]
                )}}
            </div>
            <div class="col-lg-2">
                {{Form::select(
                    'ukuran',
                    $ukuran,
                    Session::get('stok_ukuran'),
                    [
                        'placeholder'=>'Cari Ukuran ...',
                        'class'=>'form-control',
                        'onchange'=>"ajaxLoad('".url('stok/list')."?ukuran=1&search='+$(this).val(),'data')",
                        'id'=>'ukuran',
                    ]
                )}}
            </div>
            <div class="col-lg-2">
                {{Form::select(
                    'warna',
                    $warna,
                    Session::get('stok_warna'),
                    [
                        'placeholder'=>'Cari Warna ...',
                        'class'=>'form-control',
                        'onchange'=>"ajaxLoad('".url('stok/list')."?warna=1&search='+$(this).val(),'data')",
                        'id'=>'warna',
                    ]
                )}}
            </div>
            <div class="col-lg-1">
                <button class="btn btn-warning" onclick="reset()">Reset</button>
            </div>
            <div id="data"></div>
        </div>
    </div>
</div>
<script>
    function reset(){
        $("#supplier").val('');
        $("#jenis").val('');
        $("#ukuran").val('');
        $("#warna").val('');
        ajaxLoad('{{url('stok/resetList')}}','data');
    }
    $(document).ready(function(e){
        ajaxLoad('{{url('stok/list')}}','data');
    });
</script>
@stop
