<?php
    $no = 8 * $suppliers->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td>
                <a href="javascript:ajaxLoad('supplier/list?field=id&sort={{Session::get("supplier_sort")=="asc"?"desc":"asc"}}','data')">
                Kode
                </a>
                <i class="glyphicon {{ Session::get('supplier_field')=='id'?(Session::get('supplier_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td>
                <a href="javascript:ajaxLoad('supplier/list?field=nama&sort={{Session::get("supplier_sort")=="asc"?"desc":"asc"}}','data')">
                Nama
                </a>
                <i class="glyphicon {{ Session::get('supplier_field')=='nama'?(Session::get('supplier_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td><b>Action</b></td>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->nama }}</td>
                    <td>
                        <button onclick="javascript: window.location.href = '{{ url('supplier/'.$supplier->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('supplier/'.$supplier->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $suppliers->total() }}
<div class="pull-right">{{ $suppliers->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
