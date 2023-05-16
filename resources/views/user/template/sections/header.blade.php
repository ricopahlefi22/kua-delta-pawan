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
                <div class="dropdown header-nav-item-select nav-notification">
                    <div class="toggle-wrapper" id="nav-notification-dropdown" data-bs-toggle="dropdown">
                        <i class="header-nav-item-select nav-icon feather icon-bell"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="nav-notification-header">
                            <h5 class="mb-0">Notifikasi</h5>
                        </div>
                        <div class="nav-notification-body">
                            <div class="nav-notification-item ">
                                <div class="bg-primary feather font-size-lg icon-info avatar avatar-circle"
                                    style="width: 40px; height: 40px; line-height: 40px;"> </div>
                                <div class="ms-2">
                                    <span>
                                        <span class="fw-bolder text-dark"> </span>
                                        <span>Contoh Item Notifikasi.</span>
                                    </span>
                                    <div class="font-size-sm fw-bold mt-1">
                                        <i class="feather icon-clock"></i>
                                        <span class="ms-1">Baru saja</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-notification-footer">
                            <a class="font-size-sm text-muted">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
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
                        <a class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <i class="font-size-lg me-2 feather icon-user text-muted"></i>
                                <span class="text-muted">Profil</span>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <i class="font-size-lg me-2 feather icon-life-buoy text-muted"></i>
                                <span class="text-muted">Bantuan</span>
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
