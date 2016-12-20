@extends('layouts.app')
@section('title') Daftar Pembelian | @stop
@section('content')

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
        {{ Session::get('message') }}
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        </div>
    @endif
    <h2>
        Daftar Pembelian
        <a href="{{ URL('pembelian/add') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</a>
    </h2>
    <hr />
    <div class="col-lg-12">
        <div id="data"></div>
    </div>
</div>
<script>
    $(document).ready(function(e){
        ajaxLoad('{{url('pembelian/list')}}','data');
    });
</script>
@stop
