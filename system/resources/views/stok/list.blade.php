<div class="row">
    @foreach($tokos as $toko)
        <div class="col-lg-12">
            <div class="panel panel-default table-responsive" style="height:300px;">
                <div class="panel-heading">
                    <big><strong>{{ $toko->nama }}</strong></big>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead>
                            <td><b>No</b></td>
                            <td><b>Nama Barang</b></td>
                            <td><b>Supplier</b></td>
                            <td><b>Jenis</b></td>
                            <td><b>Ukuran</b></td>
                            <td><b>Warna</b></td>
                            <td><b>Qty</b></td>
                        </thead>
                        <tbody>
                            <?php $no=0; ?>
                            @foreach ($stoks as $stok)
                                @if($stok->toko->id == $toko->id)
                                    @if($stok->barang != null)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $stok->barang->nama }}</td>
                                            <td>{{ $stok->barang->supplier->nama }}</td>
                                            <td>{{ $stok->barang->jenis->nama }}</td>
                                            <td>{{ $stok->barang->ukuran->nama }}</td>
                                            <td>{{ $stok->barang->warna->nama }}</td>
                                            <td>{{ $stok->qty }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
