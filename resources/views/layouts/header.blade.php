<nav class="navbar navbar-default">
	<div class="container">
    	<div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL('/') }}">Website</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav">
            	<li><a href="{{ URL('/') }}">Home</a></li>
                <li><a href="{{ URL('barang') }}">Barang</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="{{ URL('keluar') }}">Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>