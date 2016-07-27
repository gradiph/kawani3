@extends('template.t_index')
@section('content')

@if(Session::has('message'))
    <span class="label label-success">{{ Session::get('message') }}</span>
@endif
<p></p>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <th>No</th>
                <th>Kode</th>
                <th>Kode Lama</th>
                <th>Nama</th>
                <th>Supplier</th>
                <th>Jenis</th>
                <th>Ukuran</th>
                <th>Warna</th>
                <th>Harga Jual</th>
                <th>HPP</th>
                <th>OT</th>
                <th>CMH</th>
                <th>DU</th>
                <th>CSN</th>
                <th>LKG</th>
                <th>JTN</th>
                <th>GDG</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                $no=1; 
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
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->kode_lama }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $supplier }}</td>
                        <td>{{ $jenis }}</td>
                        <td>{{ $ukuran }}</td>
                        <td>{{ $warna }}</td>
                        <td>{{ number_format($data->harga_jual,0,',','.') }}</td>
                        <td>{{ number_format($data->hpp,0,',','.') }}</td>
                        <td>{{ number_format($data->stok_ot,0,',','.') }}</td>
                        <td>{{ number_format($data->stok_cmh,0,',','.') }}</td>
                        <td>{{ number_format($data->stok_du,0,',','.') }}</td>
                        <td>{{ number_format($data->stok_csn,0,',','.') }}</td>
                        <td>{{ number_format($data->stok_lkg,0,',','.') }}</td>
                        <td>{{ number_format($data->stok_jtn,0,',','.') }}</td>
                        <td>{{ number_format($data->stok_gdg,0,',','.') }}</td>
                        <td><a href="edit/{{ $data->id }}">Edit</a> | <a href="delete/{{ $data->id }}">Hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ URL('barang/add') }}" class="btn btn-danger">Tambah Data</a>
        <a href="{{ URL('') }}" class="btn btn-danger">Kembali ke Menu</a>
    </div>
</div>

@stop