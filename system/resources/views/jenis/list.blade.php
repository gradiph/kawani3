<?php
    $no = 8 * $jeniss->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td>
                <a href="javascript:ajaxLoad('jenis/list?field=id&sort={{Session::get("jenis_sort")=="asc"?"desc":"asc"}}','data')">
                Kode
                </a>
                <i class="glyphicon {{ Session::get('jenis_field')=='id'?(Session::get('jenis_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td>
                <a href="javascript:ajaxLoad('jenis/list?field=nama&sort={{Session::get("jenis_sort")=="asc"?"desc":"asc"}}','data')">
                Nama
                </a>
                <i class="glyphicon {{ Session::get('jenis_field')=='nama'?(Session::get('jenis_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td><b>Action</b></td>
        </thead>
        <tbody>
            @foreach ($jeniss as $jenis)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $jenis->id }}</td>
                    <td>{{ $jenis->nama }}</td>
                    <td>
                        <button onclick="javascript: window.location.href = '{{ url('jenis/'.$jenis->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('jenis/'.$jenis->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $jeniss->total() }}
<div class="pull-right">{{ $jeniss->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
