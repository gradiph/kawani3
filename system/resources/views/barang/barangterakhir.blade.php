<?php
//    foreach($barangs as $barang)
//    {
//        echo $barang->id;
//    }
    if($barang)
    {
        echo substr($barang->id,0,3) . '-' .
        '<strong><big>' .
        substr($barang->id,3,4) . '-' .
        '</big></strong>' .
        substr($barang->id,7,1) . '-' .
        substr($barang->id,8,2) . '-' .
        substr($barang->id,10,2) . '.' .
        $barang->nama . '.' .
        $barang->jenis->nama . '.' .
        $barang->ukuran->nama . '.' .
        $barang->warna->nama;
    }
    else
    {
        echo "Belum ada barang";
    }
?>
