<?php
    $no = 8 * $pembelians->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td><b>Tanggal</b></td>
            <td><b>Kode Barang</b></td>
            <td><b>Nama Barang</b></td>
            <td><b>Supplier</b></td>
            <td><b>Jenis</b></td>
            <td><b>Ukuran</b></td>
            <td><b>Warna</b></td>
            <td><b>Jumlah</b></td>
        </thead>
        <tbody>
            @foreach ($pembelians as $pembelian)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pembelian->created_at }}</td>
                    <td>{{ $pembelian->barang->id }}</td>
                    <td>{{ $pembelian->barang->nama }}</td>
                    <td>{{ $pembelian->barang->supplier->nama }}</td>
                    <td>{{ $pembelian->barang->jenis->nama }}</td>
                    <td>{{ $pembelian->barang->ukuran->nama }}</td>
                    <td>{{ $pembelian->barang->warna->nama }}</td>
                    <td>{{ $pembelian->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $pembelians->total() }}
<div class="pull-right">{{ $pembelians->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
