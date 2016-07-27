@extends('template.t_index')
@section('content')

<script language="javascript">
$("document").ready(function() {
    $("#pesan").dialog({
		autoOpen:false,
		modal:true,
		show:true,
		hide:true,
		button:{
			"Simpan Retur" : function () {
				
			},
			"Batal" : function() {
				$(this).dialog("close");
			}
		}
	});
});
function retur(id) {
	$("#pesan").dialog(open);
}
</script>
<div id="pesan" title="Retur">
	
</div>
@if(Session::has('message'))
    <span class="label label-success">{{ Session::get('message') }}</span>
@endif
<p></p>
<div class="table-responsive">
	<h1>Transaksi No. {{ $transaksi->id }}</h1>
    <p>
    Tanggal Transaksi : {{ $transaksi->tgl }}
    </p>
    <table id="tabel-detail" class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga Jual</th>
            <th>Subtotal</th>
            <th>Besar Diskon</th>
            <th>Harga Diskon</th>
            <th>HPP</th>
            <th>Total HPP</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php 
			$no=1; 
			?>
            @foreach($detail_transaksi as $data)
            	<?php
				$subtotal = $data->jumlah * $data->harga_jual;
				$harga_diskon = $subtotal - $data->persen_diskon * $subtotal / 100;
				$total_hpp = $data->jumlah * $data->hpp;
				?>
            	<tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ number_format($data->jumlah,0,',','.') }}</td>
                    <td>{{ number_format($data->harga_jual,0,',','.') }}</td>
                    <td>{{ number_format($subtotal,0,',','.') }}</td>
                    <td>{{ number_format($data->persen_diskon) }}%</td>
                    <td>{{ number_format($harga_diskon,0,',','.') }}</td>
                    <td>{{ number_format($data->hpp,0,',','.') }}</td>
                    <td>{{ number_format($total_hpp,0,',','.') }}</td>
                    <td><button onclick="retur('{{ $data->id }}')" >Retur</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Retur</h1>
    <table id="tabel-retur" class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </thead>
        <tbody>
            <?php 
			$no=1; 
			?>
            @foreach($retur as $data)
            	<tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->tgl }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ URL('transaksi') }}" class="btn btn-danger">Kembali</a>
</div>

@stop