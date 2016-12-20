<?php
    $no = 8 * $barangs->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td><b>Kode</b></td>
            <td><b>Nama</b></td>
            <td><b>Supplier</b></td>
            <td><b>Jenis</b></td>
            <td><b>Ukuran</b></td>
            <td><b>Warna</b></td>
            <td><b>Harga Jual</b></td>
            <td><b>HPP</b></td>
            <td><b>Action</b></td>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->nama }}</td>
                    <td>{{ $barang->supplier->nama }}</td>
                    <td>{{ $barang->jenis->nama }}</td>
                    <td>{{ $barang->ukuran->nama }}</td>
                    <td>{{ $barang->warna->nama }}</td>
                    <td>{{ number_format($barang->harga_jual,0,',','.') }}</td>
                    <td>{{ number_format($barang->hpp,0,',','.') }}</td>
                    <td>
                        <button onclick="javascript: window.location.href = '{{ url('barang/'.$barang->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('barang/'.$barang->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $barangs->total() }}
<div class="pull-right">{{ $barangs->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
