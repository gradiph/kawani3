@extends('layouts.app')
@section('content')

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
        {{ Session::get('message') }}
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        </div>
    @endif
    <h2>
        Pengolahan Data Penjualan
        <a href="{{ URL('transaksi/add') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</a>
    </h2>
    <hr />
    <div class="pull-right">{{ $transaksis->render() }}</div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Waktu</th>
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
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                        <td>{{ $transaksi->toko->nama }}</td>
                        <td>{{ $transaksi->jenis_bayar }}</td>
                        <td>{{ number_format($transaksi->total_jual,0,',','.') }}</td>
                        <td>{{ number_format($transaksi->total_hpp,0,',','.') }}</td>
                        <td>{{ number_format($transaksi->total_diskon,0,',','.') }}</td>
                        <td>{{ number_format($transaksi->total_qty,0,',','.') }}</td>
                        <td>{{ $transaksi->user->nama }}</td>
                        <td><a href="transaksi/{{ $transaksi->id }}">Lihat</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        Total Data : {{ $total }}
        <div class="pull-right">{{ $transaksis->render() }}</div>
        <p></p>
        <a href="{{ URL('transaksi/add') }}" class="btn btn-danger"> Tambah Transaksi </a> <a href="{{ URL('') }}" class="btn btn-danger"> Kembali ke Menu </a>
    </div>
</div>

@stop
