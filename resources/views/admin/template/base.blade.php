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
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>

    <!-- Sweet Alert 2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @stack('script')

    <!-- Core JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>


</body>

</html>
