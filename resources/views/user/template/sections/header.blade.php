<div class="header-text-dark header-nav layout-horizon">
    <div class="header-nav-wrap container">
        <div class="header-nav-left">
            <div class="nav-logo">
                <div class="w-100 logo">
                    <img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" style="max-height: 35px;"
                        alt="logo">
                </div>
            </div>
            <div class="header-nav-item mobile-toggle">
                <div class="header-nav-item-select cursor-pointer">
                    <img class="img-fluid" src="{{ asset('assets/images/logo/logo-raw.png') }}"
                        style="max-height: 35px;" alt="logo">
                </div>
            </div>
        </div>
        <div class="header-nav-right">
            <div class="header-nav-item">
                <div class="dropdown header-nav-item-select nav-profile">
                    <div class="toggle-wrapper" id="nav-profile-dropdown" data-bs-toggle="dropdown">
                        <div class="avatar avatar-circle avatar-image"
                            style="width: 35px; height: 35px; line-height: 35px;">
                            @if (empty(Auth::user()->photo))
                                <img src="{{ asset('photo.jpg') }}" alt="">
                            @else
                                <img src="{{ asset(Auth::user()->photo) }}" alt="">
                            @endif
                        </div>
                        <span class="fw-bold mx-1">{{ Auth::user()->name }}</span>
                        <i class="feather icon-chevron-down"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="nav-profile-header">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-circle avatar-image">
                                    @if (empty(Auth::user()->photo))
                                        <img src="{{ asset('photo.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset(Auth::user()->photo) }}" alt="">
                                    @endif
                                </div>
                                <div class="d-flex flex-column ms-1">
                                    <span class="fw-bold text-dark">{{ Auth::user()->name }}</span>
                                    <span class="font-size-sm">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <a href="profile" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <i class="font-size-lg me-2 feather icon-user"></i>
                                <span>Profil</span>
                            </div>
                        </a>
                        <a href="{{ url('logout') }}" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <i class="font-size-lg me-2 feather icon-power"></i>
                                <span>Keluar</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
