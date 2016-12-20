<?php
    $no = 8 * $users->currentPage() - 7;
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <td><b>No</b></td>
            <td>
                <a href="javascript:ajaxLoad('user/list?field=username&sort={{Session::get("user_sort")=="asc"?"desc":"asc"}}','data')">
                Username
                </a>
                <i class="glyphicon {{ Session::get('user_field')=='id'?(Session::get('user_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td>
                <a href="javascript:ajaxLoad('user/list?field=nama&sort={{Session::get("user_sort")=="asc"?"desc":"asc"}}','data')">
                Nama
                </a>
                <i class="glyphicon {{ Session::get('user_field')=='nama'?(Session::get('user_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td>
                <a href="javascript:ajaxLoad('user/list?field=level&sort={{Session::get("user_sort")=="asc"?"desc":"asc"}}','data')">
                Position
                </a>
                <i class="glyphicon {{ Session::get('user_field')=='level'?(Session::get('user_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </td>
            <td><b>Action</b></td>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->level }}</td>
                    <td>
                        <button onclick="javascript: window.location.href = '{{ url('user/'.$user->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('user/'.$user->id.'/password') }}'" title="Ubah Password" class="btn-warning img-rounded"><span class="glyphicon glyphicon-lock"></span></button>
                        <button onclick="javascript: window.location.href = '{{ url('user/'.$user->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
Total Data : {{ $users->total() }}
<div class="pull-right">{{ $users->render() }}</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'),'data');
    });
</script>
