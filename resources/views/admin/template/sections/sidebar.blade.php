@php
    function routeActive($route)
    {
        if (Route::current()->uri == $route) {
            return 'router-link-active';
        }
    }

    function routeMenuOpen()
    {
        if (Route::current()->uri == 'registrations' || Route::current()->uri == 'weddings') {
            return 'display: block;';
        }
    }
@endphp
<div class="side-nav vertical-menu nav-menu-light scrollable">
    <div class="nav-logo">
        <div class="w-100 logo">
            <img class="img-fluid" src="favicon.png" style="max-height: 35px;" alt="logo">
        </div>
        <div class="mobile-close">
            <i class="icon-arrow-left feather"></i>
        </div>
    </div>
    <ul class="nav-menu">
        <li class="nav-menu-item {{ routeActive('dashboard') }}">
            <a href="dashboard">
                <i class="feather icon-home"></i>
                <span class="nav-menu-item-title">Beranda</span>
            </a>
        </li>
        <li class="nav-group-title">Manajemen Pernikahan</li>
        <li class="nav-submenu">
            <a class="nav-submenu-title">
                <i class="feather icon-heart-on"></i>
                <span>Data Pernikahan</span>
                <i class="nav-submenu-arrow"></i>
            </a>
            <ul class="nav-menu menu-collapse" style="{{ routeMenuOpen() }}">
                <li class="nav-menu-item {{ routeActive('registration') }}">
                    <a href="registrations">Pendaftaran</a>
                </li>
                <li class="nav-menu-item {{ routeActive('weddings') }}">
                    <a href="weddings">Pernikahan</a>
                </li>
            </ul>
        </li>
        <li class="nav-group-title">Manajemen Website</li>
        <li class="nav-menu-item {{ routeActive('galleries') }}">
            <a href="galleries">
                <i class="feather icon-image"></i>
                <span class="nav-menu-item-title">Data Galeri</span>
            </a>
        </li>
        <li class="nav-group-title">Pengguna Aplikasi</li>
        <li class="nav-menu-item {{ routeActive('users') }}">
            <a href="users">
                <i class="feather icon-users"></i>
                <span class="nav-menu-item-title">Data Pengguna</span>
            </a>
        </li>
        <li class="nav-menu-item {{ routeActive('administrators') }}">
            <a href="administrators">
                <i class="la la-user-tie"></i>
                <span class="nav-menu-item-title">Data Administrator</span>
            </a>
        </li>

    </ul>
</div>
