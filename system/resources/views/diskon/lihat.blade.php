@extends('template.t_index')
@section('content')

@if(Session::has('message'))
    <span class="label label-success">{{ Session::get('message') }}</span>
@endif
<p></p>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Username</th>
            <th>Tanggal</th>
            <th>Diskon</th>
            <th>Kode</th>
            <th>Aktif</th>
            <th>Keterangan</th>
        </thead>
        <tbody>
            <?php
			$no=1;
			?>
            @foreach ($diskon as $data)
            	<?php
				$diskon_promo = DB::table('diskon_promo')
									->where('id_diskon','=',$data->id)
									->first();
				$temp = $diskon_promo->id;
				?>
            	<tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->tgl }}</td>
                    <td>{{ $data->persen_diskon }}%</td>
                    <td>{{ $data->kode_diskon }}</td>
                    <td>{{ $data->aktif }}</td>
                    @if($diskon_promo->id != $temp)
                    	<td>{{ $diskon_promo->tgl_mulai.' - '.$diskon_promo->tgl_selesai.' | '.$data->keterangan }}</td>
                    @else
                    	<td>{{ $data->keterangan }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ URL('diskon/add') }}" class="btn btn-danger">Tambah Data</a>
    <a href="{{ URL('') }}" class="btn btn-danger">Kembali ke Menu</a>
</div>

@stop
