<?php
    $no = 8 * $ukurans->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td>
                <a href="javascript:ajaxLoad('ukuran/list?field=id&sort={{Session::get("ukuran_sort")=="asc"?"desc":"asc"}}','data')">
                Kode
                </a>
                <i class="glyphicon {{ Session::get('ukuran_field')=='id'?(Session::get('ukuran_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td>
                <a href="javascript:ajaxLoad('ukuran/list?field=nama&sort={{Session::get("ukuran_sort")=="asc"?"desc":"asc"}}','data')">
                Nama
                </a>
                <i class="glyphicon {{ Session::get('ukuran_field')=='nama'?(Session::get('ukuran_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td><b>Action</b></td>
        </thead>
        <tbody>
            @foreach ($ukurans as $ukuran)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $ukuran->id }}</td>
                    <td>{{ $ukuran->nama }}</td>
                    <td>
                        <button onclick="javascript: window.location.href = '{{ url('ukuran/'.$ukuran->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('ukuran/'.$ukuran->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $ukurans->total() }}
<div class="pull-right">{{ $ukurans->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
