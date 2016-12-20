<?php
$list = [];
if(count($barangs) != 0)
    foreach ($barangs as $data) $list += [$data->id => $data->nama];
else $list = ['' => 'Barang tidak ditemukan']
?>
{{ Form::label('barang_nama','Nama Barang') }}
{{ Form::select('barang_nama', $list, '', ['class' => 'form-control']) }}
