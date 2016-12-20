<?php
    $no = 8 * $tokos->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td><b>Nama</b></td>
            <td><b>Alamat</b></td>
            <td><b>Telepon</b></td>
            <td><b>Action</b></td>
        </thead>
        <tbody>
            @foreach ($tokos as $toko)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $toko->nama }}</td>
                    <td>{{ $toko->alamat }}</td>
                    <td>{{ $toko->telepon }}</td>
                    <td>
                        <button onclick="javascript: window.location.href = '{{ url('cabang/'.$toko->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('cabang/'.$toko->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $tokos->total() }}
<div class="pull-right">{{ $tokos->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
