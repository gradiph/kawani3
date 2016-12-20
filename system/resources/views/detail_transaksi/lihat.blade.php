@extends('layouts.app')
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
<div class="container-fluid">
    <div id="pesan" title="Retur">

    </div>
    @if(Session::has('message'))
        <span class="label label-success">{{ Session::get('message') }}</span>
    @endif
    <p></p>
    <div class="table-responsive">
        <h1>Transaksi No. {{ $transaksi->id }}</h1>
        <p>
        Tanggal Transaksi : {{ $transaksi->created_at }}
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
                @foreach($transaksi->detailTransaksi->all() as $detail)
                    <?php
                    $subtotal = $detail->qty * $detail->harga_jual;
                    $harga_diskon = ($detail->diskon) ? $subtotal - $detail->diskon->persen * $subtotal / 100 : 0;
                    $total_hpp = $detail->qty * $detail->hpp;
                    ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $detail->barang->nama }}</td>
                        <td>{{ number_format($detail->qty,0,',','.') }}</td>
                        <td>{{ number_format($detail->harga_jual,0,',','.') }}</td>
                        <td>{{ number_format($subtotal,0,',','.') }}</td>
                        <td>{{ ($detail->diskon) ? number_format($detail->diskon->persen) : 0 }}%</td>
                        <td>{{ number_format($harga_diskon,0,',','.') }}</td>
                        <td>{{ number_format($detail->hpp,0,',','.') }}</td>
                        <td>{{ number_format($total_hpp,0,',','.') }}</td>
                        {{--<td><button onclick="retur('{{ $detail->id }}')" >Retur</button></td>--}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{--<h1>Retur</h1>
        <table id="tabel-retur" class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
            </tbody>
        </table>--}}
        <a href="{{ URL('transaksi') }}" class="btn btn-danger">Kembali</a>
    </div>
</div>

@stop
