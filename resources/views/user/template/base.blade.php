<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KUA Delta Pawan</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Sweet Alert 2 -->
    <link href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="layout">
        <div class="horizontal-layout">
            <!-- Header START -->
            @include('user.template.sections.header')
            <!-- Header END -->

            <!-- Content START -->
            <div class="content container">
                <div class="main">
                    @if (Route::current()->uri != 'u/profile' && Route::current()->uri != 'u/notification')
                        @include('user.template.sections.progress-bar')
                    @endif

                    @yield('content')
                </div>
                <!-- Footer START -->
                @include('user.template.sections.footer')
                <!-- Footer End -->
            </div>
            <!-- Content END -->
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>

    <!-- Sweet Alert 2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Core JS -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    @stack('script')
</body>

</html>
