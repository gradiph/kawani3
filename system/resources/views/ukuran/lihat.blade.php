@extends('layouts.app')
@section('title') Daftar Ukuran | @stop
@section('content')

<div class="container">
    <div class="row">
    	<div class="col-lg-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message') }}
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                </div>
            @endif
        	<h2>
            	Pengolahan Data Ukuran
            	<a href="{{ URL('ukuran/add') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</a>
            </h2>
            <hr />
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" id="search" value="{{ Session::get('ukuran_nama') }}"
                               onkeyup="if (event.keyCode == 13) ajaxLoad('{{url('ukuran/list')}}?nama=1&search='+this.value,'data')"
                               placeholder="Cari Nama Ukuran ..."
                               type="text"
                               autofocus>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default"
                                    onclick="ajaxLoad('{{url('ukuran/list')}}?nama=1&search='+$('#search').val(),'data')"><i
                                        class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div id="data"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e){
        ajaxLoad('{{url('ukuran/list')}}','data');
    });
</script>
@stop
