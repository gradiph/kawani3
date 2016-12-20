<?php
    $no = 8 * $warnas->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td>
                <a href="javascript:ajaxLoad('warna/list?field=id&sort={{Session::get("warna_sort")=="asc"?"desc":"asc"}}','data')">
                Kode
                </a>
                <i class="glyphicon {{ Session::get('warna_field')=='id'?(Session::get('warna_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td>
                <a href="javascript:ajaxLoad('warna/list?field=nama&sort={{Session::get("warna_sort")=="asc"?"desc":"asc"}}','data')">
                Nama
                </a>
                <i class="glyphicon {{ Session::get('warna_field')=='nama'?(Session::get('warna_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td><b>Action</b></td>
        </thead>
        <tbody>
            @foreach ($warnas as $warna)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $warna->id }}</td>
                    <td>{{ $warna->nama }}</td>
                    <td>
                        <button onclick="javascript: window.location.href = '{{ url('warna/'.$warna->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('warna/'.$warna->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $warnas->total() }}
<div class="pull-right">{{ $warnas->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
