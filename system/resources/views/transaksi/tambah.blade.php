@extends('layouts.app')
@section('content')
<?php
$tokolist = [];
foreach($tokos as $toko)
{
    $tokolist += [$toko->id => $toko->nama];
}
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Transaksi Baru
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="col-lg-2">
                        <span style="line-height: 2.2em; text-align:">Toko:</span>
                    </div>
                    <div class="col-lg-10">
                        {{ Form::select('toko', $tokolist, Session::get('toko'), ['class' => 'form-control', 'id' => 'tokolist']) }}
                    </div>
                </div>
                <div class="col-lg-6">
                    {{ Form::text('barang_id','',['class' => 'form-control', 'placeholder' => 'Masukkan kode barang','autofocus', 'id' => 'barang_id']) }}
                </div>
                <div class="col-lg-2">
                    {{ Form::number('jumlah','',['class' => 'form-control', 'placeholder' => 'Masukkan jumlah barang', 'id' => 'jumlah']) }}
                </div>
                <div class="col-lg-1">
                    {{ Form::button('Tambah',['class' => 'btn btn-primary','id' => 'btnAdd']) }}
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Barang</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td>Subtotal</td>
                            <td>Diskon</td>
                            <td>Harga Diskon</td>
                        </tr>
                    </thead>
                    <tbody>
                        <div id="databarang"></div>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align="right" colspan="2"><strong>Total Pieces</strong></td>
                            <td><strong>{{-- number_format($total_pieces,0,',','.') }}</strong></td>
                            <td align="right" colspan="3"><strong>Total Harga</strong></td>
                            <td><strong>{{ number_format($total_harga,0,',','.') --}}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <button id="btnSave" class="btn btn-success">Selesai</button>
            <button id="btnReset" class="btn btn-warning">Reset</button>
            <button onclick="javascript:history.back()" class="btn btn-danger">Kembali</button>
        </div>
    </div>
</div>
<script>
    var barang = [];
    var row, i = 1;
    $("#barang_id").keypress(function(e){
        alert(e.which);
        if(e.which == 13){
            if($(this).val() == ""){
                $("#jumlah").focus();
            }
        }
    });
    $("#jumlah").keypress(function(e){
        if(e.which == 13){
            if($(this).val() == ""){
                $("#barang_id").focus();
            }
        }
    });
    $("#btnAdd").click(){
        alert($("#barang_id").val());
//            barang_id += [$("#barang_id").val()];
//            jumlah += [$("#jumlah").val()];
//            row = "<tr>";
//            row += "<td>" + i++ + "</td>";
//            row += "<td>" + i++ + "</td>";
//            $("#databarang").append(row);
    }
</script>
@stop
