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
            	<li><a href="{{ URL('/') }}">Home</a></li>
                <li><a href="{{ URL('diskon') }}">Diskon</a></li>
                <li><a href="{{ URL('kasir') }}">Kasir</a></li>
                <li><a href="{{ URL('stok') }}">Stok</a></li>
                <li><a href="{{ URL('transaksi') }}">Transaksi</a></li>
                <li><a href="{{ URL('user') }}">User</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Toko <i class="glyphicon glyphicon-menu-down"></i></a>
                    <ul class="dropdown-menu">
                		<li><a href="{{ URL('barang') }}">Barang</a></li>
                        <li><a href="{{ URL('cabang') }}">Cabang</a></li>
                        <li><a href="{{ URL('jenis') }}">Jenis</a></li>
                        <li><a href="{{ URL('supplier') }}">Supplier</a></li>
                        <li><a href="{{ URL('ukuran') }}">Ukuran</a></li>
                        <li><a href="{{ URL('warna') }}">Warna</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="{{ URL('keluar') }}">Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>