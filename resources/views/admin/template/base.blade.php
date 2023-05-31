<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | Admin - Kantor Urusan Agama</title>

    <!-- Favicons -->
    <link href="{{ asset('favicon.png') }}" rel="icon">
    <link href="{{ asset('favicon.png') }}" rel="apple-touch-icon">

    @stack('style')

    <!-- page css -->
    <link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/apexcharts/dist/apexcharts.css') }}" rel="stylesheet">

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert 2 -->
    <link href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="layout">
        <div class="vertical-layout">
            <!-- Header START -->
            @include('admin.template.sections.header')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('admin.template.sections.sidebar')
            <!-- Side Nav END -->

            <!-- Content START -->
            <div class="content">
                @yield('content')

                @include('admin.template.sections.footer')
            </div>
            <!-- Content END -->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog right">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title pull-left">Theme Config</h4>
                            <button type="button" class="close pull-right" data-bs-dismiss="modal">
                                <span>×</span>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="mb-4">
                                <h5 class="mb-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex mt-2">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked
                                            value="#ffffff">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="#11a1fd">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="#00c569">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-info" name="header-theme" type="radio" value="#5a75f9">
                                        <label for="header-info"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-warning" name="header-theme" type="radio" value="#ffc833">
                                        <label for="header-warning"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="#f46363">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="mb-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="side-nav-theme-toggle"
                                        id="side-nav-theme-toggle">
                                    <label class="form-check-label" for="side-nav-theme-toggle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="mb-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="side-nav-fold-toogle"
                                        id="side-nav-fold-toogle">
                                    <label class="form-check-label" for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="mb-0">Horizontal Layout</h5>
                                <p>Set Horizontal Layout</p>
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-outline-primary active"
                                        aria-current="page">Vertical</a>
                                    <a href="h-index.html" class="btn btn-outline-primary">Horizontal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View END -->
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Sweet Alert 2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @stack('script')

    <!-- Core JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>


</body>

</html>
