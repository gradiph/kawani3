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
            <th>Tanggal</th>
            <th>Toko</th>
            <th>Jenis Pembayaran</th>
            <th>Total Bayar</th>
            <th>Total HPP</th>
            <th>Total Diskon</th>
            <th>Total Piece</th>
            <th>Username</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php 
			$no=1; 
			?>
            @foreach ($transaksi as $data)
            	<tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->tgl }}</td>
                    <td>{{ $data->toko }}</td>
                    <td>{{ $data->jenis_bayar }}</td>
                    <td>{{ number_format($data->total_bayar,0,',','.') }}</td>
                    <td>{{ number_format($data->total_hpp,0,',','.') }}</td>
                    <td>{{ number_format($data->total_diskon,0,',','.') }}</td>
                    <td>{{ number_format($data->total_pieces,0,',','.') }}</td>
                    <td>{{ $data->username }}</td>
                    <td><a href="transaksi/id/{{ $data->id }}">Lihat</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ URL('transaksi/add') }}" class="btn btn-danger"> Tambah Transaksi </a> <a href="{{ URL('') }}" class="btn btn-danger"> Kembali ke Menu </a>
</div>

@stop