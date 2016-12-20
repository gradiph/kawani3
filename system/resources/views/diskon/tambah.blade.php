@extends('template.t_index')
@section('content')

<p></p>
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		{{ Form::open(['url' => 'diskon/processAdd']) }}
		Jenis :
		<br />
		{{ Form::radio('jenis', 'biasa', ['checked' => 'checked']) }} Biasa
		<br />
		{{ Form::radio('jenis', 'promo') }} Promo
		<br />
        <br />
		Diskon (%) :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('persen_diskon') }}</span>
			<p></p>
		@endif
		{{ Form::number('persen_diskon', '',['placeholder' => 'Diskon (%)','class' => 'form-control']) }}
		<br />
		Keterangan :
		@if($errors->has())
			<br />
			<span class="label label-danger">{{ $errors->first('keterangan') }}</span>
			<p></p>
		@endif
		{{ Form::text('keterangan', '', ['placeholder' => 'Keterangan Diskon','class' => 'form-control']) }}
		<br />
		Tanggal Mulai (abaikan jika diskon biasa) :
		{{ Form::date('tgl_mulai', '', ['class' => 'form-control']) }}
		<br />
        Tanggal Selesai (abaikan jika diskon biasa) :
		{{ Form::date('tgl_selesai', '', ['class' => 'form-control']) }}
		<br />
        <p></p>
		{{ Form::submit('Tambah Data', ['class' => 'btn btn-danger']) }} <a href="{{ URL('diskon') }}" class="btn btn-danger">Kembali</a>
		{{ Form::close() }}
	</div>
</div>

@stop
