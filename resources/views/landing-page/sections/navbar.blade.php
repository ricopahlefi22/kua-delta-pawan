<!-- Navigation start -->
<nav class="navbar navbar-custom tt-default-nav" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="assets/images/logo/logo.png" alt=""
                    width="140"></a>
        </div>

        <div class="collapse navbar-collapse" id="custom-collapse">

            <ul class="nav navbar-nav navbar-right">

                <li class="{{ Route::current()->uri == '/' ? 'active' : '' }}"><a href="/">Beranda</a></li>
                <li class="dropdown {{ (Route::current()->uri == 'goal' || Route::current()->uri == 'structure') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::current()->uri == 'goal' ? 'active' : '' }}"><a href="goal">Visi & Misi</a></li>
                        <li class="{{ Route::current()->uri == 'structure' ? 'active' : '' }}"><a href="structure">Struktur Organisasi</a></li>

                    </ul>
                </li>
                <li class="{{ Route::current()->uri == 'gallery' ? 'active' : '' }}"><a href="gallery">Galeri</a></li>
            </ul>
        </div>
    </div><!-- /.container -->
</nav>
<!-- Navigation end -->
