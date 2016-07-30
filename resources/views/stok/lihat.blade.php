@extends('layouts.app')
@section('title') Daftar Stok | @stop
@section('content')

<div class="container">
    <div class="row">
    	<div class="col-lg-12">
            @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message') }}
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
            @endif
        	<h2>
            	Pengolahan Data Stok
            </h2>
            <hr />
            <div class="row">
            	@foreach($tokos as $toko)
                    <div class="col-lg-6">
                        <div class="panel panel-default table-responsive" style="height:300px;">
                            <div class="panel-heading">
                                <big><strong>{{ $toko->nama }}</strong></big>
                                |
                                <span id="qty{{ $toko->id }}"></span>
            					<a href="{{ URL('stok/toko/'.$toko->id.'/add') }}" class="btn btn-xs btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</a>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover table-striped text-center">
                                    <thead>
                                        <td><b>No</b></td>
                                        <td><b>Nama Barang</b></td>
                                        <td><b>Qty</b></td>
                                        <td><b>Action</b></td>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; ?>
                                        @foreach ($stoks as $stok)
                                        	@if($stok->toko->id == $toko->id)
                                                <tr>
                                                    <td>{{ ++$no }}</td>
                                                    <td>{{ $stok->barang->nama }}</td>
                                                    <td>{{ $stok->qty }}</td>
                                                    <td>
                                                        <button onclick="javascript: window.location.href = '{{ url('stok/'.$stok->id.'/edit') }}'" title="Ubah Data" class="btn-success img-rounded"><span class="glyphicon glyphicon-edit"></span></button>
                                                        <button onclick="javascript: window.location.href = '{{ url('stok/'.$stok->id.'/delete') }}'" title="Hapus Data" class="btn-danger img-rounded"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <script>
                                            $("#qty{{ $toko->id }}").html("Jumlah Barang : {{ $no }}");
                                        </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
