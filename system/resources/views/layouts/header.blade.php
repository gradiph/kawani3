<style>
ul.nav li.dropdown:hover ul.dropdown-menu{
    display: block;
}
</style>
<nav class="navbar navbar-default">
	<div class="container">
    	<div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL('/') }}">Kawani</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav">
            	<li><a href="{{ URL('home') }}">Home</a></li>
                {{--<li><a href="{{ URL('diskon') }}">Diskon</a></li>
                <li><a href="{{ URL('kasir') }}">Kasir</a></li>--}}
                <li><a href="{{ URL('stok') }}">Stok</a></li>
                <li><a href="{{ URL('pembelian') }}">Pembelian</a></li>
                <li><a href="{{ URL('transaksi') }}">Penjualan</a></li>
                <li><a href="{{ URL('retur') }}">Retur</a></li>
                <li><a href="{{ URL('pengunjung') }}">Pengunjung</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Toko <i class="glyphicon glyphicon-menu-down"></i></a>
                    <ul class="dropdown-menu">
                		<li><a href="{{ URL('barang') }}">Barang</a></li>
                        <li><a href="{{ URL('cabang') }}">Cabang</a></li>
                        <li><a href="{{ URL('supplier') }}">Supplier</a></li>
                        <li><a href="{{ URL('jenis') }}">Jenis</a></li>
                        <li><a href="{{ URL('ukuran') }}">Ukuran</a></li>
                        <li><a href="{{ URL('warna') }}">Warna</a></li>
                    </ul>
                </li>
                <li><a href="{{ URL('user') }}">User</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
<!--                <li><a href="#" id="lock"><span class="glyphicon glyphicon-lock"></span> Kunci</a></li>-->
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user() ? Auth::user()->nama : "" }}</a></li>
                <li><a href="{{ URL('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>
