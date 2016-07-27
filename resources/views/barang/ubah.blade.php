@extends('template.t_index')
@section('content')

<p></p>
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		{{ Form::open(['url' => 'barang/processEdit','name' => 'form_barang']) }}
		Kode : 
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('kode') }}</span>
			<p></p>
		@endif
		{{ Form::text('kode', $barang->kode, ['placeholder' => 'Kode Barang','class' => 'form-control','onChange' => 'tampilDataLengkap();']) }}
		<br />
		Kode Lama : 
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('kode_lama') }}</span>
			<p></p>
		@endif
		{{ Form::text('kode_lama', $barang->kode_lama,['placeholder' => 'Kode Lama Barang','class' => 'form-control']) }}
		<br />
		Nama : 
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('nama') }}</span>
			<p></p>
		@endif
		{{ Form::text('nama', $barang->nama, ['placeholder' => 'Nama Barang','class' => 'form-control']) }}
		<br />
		Supplier : 
		{{ Form::text('supplier', '',['placeholder' => 'Nama Supplier','class' => 'form-control','readonly' => 'readonly']) }}
		<br />
		Jenis : 
		{{ Form::text('jenis', '',['placeholder' => 'Nama Jenis','class' => 'form-control','readonly' => 'readonly']) }}
		<br />
		Ukuran : 
		{{ Form::text('ukuran', '',['placeholder' => 'Nama Ukuran','class' => 'form-control','readonly' => 'readonly']) }}
		<br />
		Warna : 
		{{ Form::text('warna', '',['placeholder' => 'Nama Warna','class' => 'form-control','readonly' => 'readonly']) }}
		<br />
        HPP :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('hpp') }}</span>
			<p></p>
		@endif
		{{ Form::number('hpp', $barang->hpp, ['placeholder' => 'HPP','class' => 'form-control']) }}
		<br />
        Harga Jual :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('harga_jual') }}</span>
			<p></p>
		@endif
		{{ Form::number('harga_jual', $barang->harga_jual, ['placeholder' => 'Harga Jual','class' => 'form-control']) }}
		<br />
        Stok Otten :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('stok_ot') }}</span>
			<p></p>
		@endif
		{{ Form::number('stok_ot', $barang->stok_ot, ['placeholder' => 'Stok Otten','class' => 'form-control']) }}
		<br />
        Stok Cimahi :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('stok_cmh') }}</span>
			<p></p>
		@endif
		{{ Form::number('stok_cmh', $barang->stok_cmh, ['placeholder' => 'Stok Cimahi','class' => 'form-control']) }}
		<br />
        Stok Dipati Ukur :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('stok_du') }}</span>
			<p></p>
		@endif
		{{ Form::number('stok_du', $barang->stok_du, ['placeholder' => 'Stok Dipati Ukur','class' => 'form-control']) }}
		<br />
        Stok Consina :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('stok_csn') }}</span>
			<p></p>
		@endif
		{{ Form::number('stok_csn', $barang->stok_csn, ['placeholder' => 'Stok Consina','class' => 'form-control']) }}
		<br />
        Stok Lengkong 2 :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('stok_lkg') }}</span>
			<p></p>
		@endif
		{{ Form::number('stok_lkg', $barang->stok_lkg, ['placeholder' => 'Stok Lengkong 2','class' => 'form-control']) }}
		<br />
        Stok Jatinangor :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('stok_jtn') }}</span>
			<p></p>
		@endif
		{{ Form::number('stok_jtn', $barang->stok_jtn, ['placeholder' => 'Stok Jatinangor','class' => 'form-control']) }}
		<br />
        Stok Gudang :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('stok_gdg') }}</span>
			<p></p>
		@endif
		{{ Form::number('stok_gdg', $barang->stok_gdg, ['placeholder' => 'Stok Gudang','class' => 'form-control']) }}
		<br />
		<p></p>
		{{ Form::submit('Simpan', ['class' => 'btn btn-danger']) }} <a href="{{ URL('barang/read') }}" class="btn btn-danger">Kembali</a>
		{{ Form::close() }}
	</div>
</div>

@stop