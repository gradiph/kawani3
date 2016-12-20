@extends('template.t_index')
@section('content')

@if(Session::has('message'))
    <span class="label label-success">{{ Session::get('message') }}</span>
@endif
<style>
.kolom-aktif {background-color:#EEE ;}
</style>
<script>
$(document).ready(function(){
	$("#rad_ot").click(function(){
		$(".ot").addClass("kolom-aktif");
		$(".cmh").removeClass("kolom-aktif");
		$(".du").removeClass("kolom-aktif");
		$(".csn").removeClass("kolom-aktif");
		$(".lkg").removeClass("kolom-aktif");
		$(".jtn").removeClass("kolom-aktif");
		$(".gdg").removeClass("kolom-aktif");
	});
	$("#rad_cmh").click(function(){
		$(".ot").removeClass("kolom-aktif");
		$(".cmh").addClass("kolom-aktif");
		$(".du").removeClass("kolom-aktif");
		$(".csn").removeClass("kolom-aktif");
		$(".lkg").removeClass("kolom-aktif");
		$(".jtn").removeClass("kolom-aktif");
		$(".gdg").removeClass("kolom-aktif");
	});
	$("#rad_du").click(function(){
		$(".ot").removeClass("kolom-aktif");
		$(".cmh").removeClass("kolom-aktif");
		$(".du").addClass("kolom-aktif");
		$(".csn").removeClass("kolom-aktif");
		$(".lkg").removeClass("kolom-aktif");
		$(".jtn").removeClass("kolom-aktif");
		$(".gdg").removeClass("kolom-aktif");
	});
	$("#rad_csn").click(function(){
		$(".ot").removeClass("kolom-aktif");
		$(".cmh").removeClass("kolom-aktif");
		$(".du").removeClass("kolom-aktif");
		$(".csn").addClass("kolom-aktif");
		$(".lkg").removeClass("kolom-aktif");
		$(".jtn").removeClass("kolom-aktif");
		$(".gdg").removeClass("kolom-aktif");
	});
	$("#rad_lkg").click(function(){
		$(".ot").removeClass("kolom-aktif");
		$(".cmh").removeClass("kolom-aktif");
		$(".du").removeClass("kolom-aktif");
		$(".csn").removeClass("kolom-aktif");
		$(".lkg").addClass("kolom-aktif");
		$(".jtn").removeClass("kolom-aktif");
		$(".gdg").removeClass("kolom-aktif");
	});
	$("#rad_jtn").click(function(){
		$(".ot").removeClass("kolom-aktif");
		$(".cmh").removeClass("kolom-aktif");
		$(".du").removeClass("kolom-aktif");
		$(".csn").removeClass("kolom-aktif");
		$(".lkg").removeClass("kolom-aktif");
		$(".jtn").addClass("kolom-aktif");
		$(".gdg").removeClass("kolom-aktif");
	});
	$("#rad_gdg").click(function(){
		$(".ot").removeClass("kolom-aktif");
		$(".cmh").removeClass("kolom-aktif");
		$(".du").removeClass("kolom-aktif");
		$(".csn").removeClass("kolom-aktif");
		$(".lkg").removeClass("kolom-aktif");
		$(".jtn").removeClass("kolom-aktif");
		$(".gdg").addClass("kolom-aktif");
	});
});
</script>

<p></p>
<div class="panel panel-default">
	<div class="panel-heading">
		Pilih Barang
	</div>
	<div class="panel-body">
		{{ Form::open(['url' => 'kasir/confirm']) }}
		Toko :
        <input type="radio" name="toko" value="Otten" id="rad_ot" /> Otten
		<input type="radio" name="toko" value="Cimahi" id="rad_cmh" /> Cimahi
		<input type="radio" name="toko" value="Dipati Ukur" id="rad_du" /> Dipati Ukur
		<input type="radio" name="toko" value="Consina" id="rad_csn" /> Consina
		<input type="radio" name="toko" value="Lengkong 2" id="rad_lkg" /> Lengkong 2
		<input type="radio" name="toko" value="Jatinangor" id="rad_jtn" /> Jatinangor
		<input type="radio" name="toko" value="Gudang" id="rad_gdg" /> Gudang
		<br />
        <br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Nama Barang</td>
                        <td class="ot">OT</td>
                        <td class="cmh">CMH</td>
                        <td class="du">DU</td>
                        <td class="csn">CSN</td>
                        <td class="lkg">LKG</td>
                        <td class="jtn">JTN</td>
                        <td class="gdg">GDG</td>
                        <td>Jumlah</td>
                        <td>Diskon</td>
                    </tr>
                </thead>
                <tbody>
               	<?php
				use App\Classes\Pengkodean_barang;
				$pengkodean_barang = new pengkodean_barang();
				?>
				@foreach ($barang as $data)
					<?php
					$kode_supplier = 's' . substr($data->kode,0,3);
					$supplier = $pengkodean_barang->getSupplier($kode_supplier);
					$kode_jenis = 'j' . substr($data->kode,7,1);
					$jenis = $pengkodean_barang->getJenis($kode_jenis);
					$kode_ukuran = 'u' . substr($data->kode,8,2);
					$ukuran = $pengkodean_barang->getUkuran($kode_ukuran);
					$kode_warna = 'w' . substr($data->kode,10,2);
					$warna = $pengkodean_barang->getWarna($kode_warna);
					?>
					<tr>
						<td><small>{{ $supplier }} / {{ $jenis }} / {{ $ukuran }} / {{ $warna }}</small><br />
                        	<strong>{{ $data->nama }}</strong>
                            {{ Form::hidden('id_barang[]', $data->id) }}</td>
						<td class="ot">{{ number_format($data->stok_ot,0,',','.') }}</td>
						<td class="cmh">{{ number_format($data->stok_cmh,0,',','.') }}</td>
						<td class="du">{{ number_format($data->stok_du,0,',','.') }}</td>
						<td class="csn">{{ number_format($data->stok_csn,0,',','.') }}</td>
						<td class="lkg">{{ number_format($data->stok_lkg,0,',','.') }}</td>
						<td class="jtn">{{ number_format($data->stok_jtn,0,',','.') }}</td>
						<td class="gdg">{{ number_format($data->stok_gdg,0,',','.') }}</td>
                        <td>{{ Form::text('jumlah[]', '', ['placeholder' => '0', 'size' => '2']) }}</td>
                        <td>{{ Form::text('diskon[]', '', ['placeholder' => '0', 'size' => '1']) }}</td>
					</tr>
				@endforeach
                </tbody>
            </table>
        </div>
		{{ Form::submit('Lanjut', ['class' => 'btn btn-danger']) }} <a href="{{ URL('') }}" class="btn btn-danger">Kembali Ke Menu</a>
		{{ Form::close() }}
	</div>
</div>

@stop
