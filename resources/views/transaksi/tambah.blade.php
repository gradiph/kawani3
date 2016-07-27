@extends('template.t_index')
@section('content')

<p></p>
<div class="panel panel-default">
	<div class="panel-heading">
		Konfirmasi Transaksi
	</div>
	<div class="panel-body">
		{{ Form::open(['url' => 'transaksi/processAdd','name' => 'form_transaksi']) }}
		Toko : {{ Form::text('toko', $toko, ['readonly' => 'readonly']) }}
		<br />
        <br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Barang</td>
                        <td>Jumlah</td>
                        <td>Harga</td>
                        <td>Subtotal</td>
                        <td>Diskon</td>
                        <td>Harga Diskon</td>
                    </tr>
                </thead>
                <tbody>
                <?php 
				$no = 0;
				$total_pieces = 0;
				$total_harga = 0;
				?>
				@for($i = 0; $i < count($jumlah); $i++)
					@if($jumlah[$i] != 0)
                    	<?php
						$data_barang = DB::table('barang')
											->where('id','=',$id_barang[$i])
											->first();
						$subtotal = $jumlah[$i] * $data_barang->harga_jual;
						$harga_diskon = $subtotal - $diskon[$i] * $subtotal / 100;
						$total_pieces += $jumlah[$i];
						$total_harga += $harga_diskon;
						?>
                    <tr>
						<td>{{ ++$no }}</td>
                        <td>{{ $data_barang->nama }}
                        	{{ Form::hidden('id_barang[]',$id_barang[$i]) }}
                        	{{ Form::hidden('jumlah[]',$jumlah[$i]) }}
                        	{{ Form::hidden('diskon[]',$diskon[$i]) }}</td>
						<td>{{ $jumlah[$i] }}</td>
						<td>{{ number_format($data_barang->harga_jual,0,',','.') }}</td>
						<td>{{ number_format($subtotal,0,',','.') }}</td>
						<td>{{ number_format((float)$diskon[$i],0,',','.') }}</td>
						<td>{{ number_format($harga_diskon,0,',','.') }}</td>
					</tr>
                    @endif
				@endfor
                </tbody>
                <tfoot>
                	<tr>
                    	<td align="right" colspan="2"><strong>Total Pieces</strong></td>
                        <td><strong>{{ number_format($total_pieces,0,',','.') }}</strong></td>
                        <td align="right" colspan="3"><strong>Total Harga</strong></td>
                        <td><strong>{{ number_format($total_harga,0,',','.') }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <p>
        Pembayaran : 
        {{ Form::select('jenis_bayar',[
        	'Tunai' => 'Tunai',
            'Debit' => 'Debit',
            'Credit' => 'Credit',
            'Mandiri' => 'Mandiri'
        ]) }}
        </p>
        <p>
        Jumlah Bayar : 
        {{ Form::text('total_bayar', $total_harga) }}
        </p>
		{{ Form::submit('Simpan', ['class' => 'btn btn-danger']) }} <a href="{{ URL('kasir') }}" class="btn btn-danger">Kembali</a>
		{{ Form::close() }}
	</div>
</div>

@stop
